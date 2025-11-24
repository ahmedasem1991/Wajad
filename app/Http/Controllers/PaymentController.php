<?php

namespace App\Http\Controllers;

use App\Notifications\BroadcastNotification;
use App\Package;
use App\Services\Paytabs;
use App\Setting;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laravel\Nova\Nova;
use PayPal\Api\Amount;
use PayPal\Api\InputFields;
// use Damas\Paytabs\Paytabs;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\WebProfile;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use URL;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        // Main configuration in constructor
        $paypalConfig = \Config::get('paypal');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfig['client_id'],
                $paypalConfig['secret']
            )
        );

        $this->apiContext->setConfig($paypalConfig['settings']);
    }

    public function payWithpaytabs(Request $request)
    {
        // dd(route('paytabschecker'));
        $Package = Package::find(base64_decode($request->get('p')));

        \Session::forget('Package');
        \Session::forget('corporate_id');
        \Session::put('Package', $Package);
        $package_id = base64_decode($request->get('p'));
        // dd(env('ADMIN_URL').'/'.  Nova::path() . '/resources/packages/'.$package_id);
        \Session::put('package_id', base64_decode($request->get('p')));
        \Session::put('corporate_id', auth()->user()->corporate_id);

        $user_id = Auth()->user()->id;
        $Price = (int) ltrim($Package->price, ' - '.env('CURRENCY'));

        $email = env('PAYTABS_EMAIL');
        $secret = env('PAYTABS_SECRET');
        $pt = Paytabs::getInstance($email, $secret);
        $result = $pt->create_pay_page([
            'merchant_email' => $email,
            'secret_key' => $secret,
            'title' => auth()->user()->corporate->name_en,
            'cc_first_name' => auth()->user()->corporate->name_en,
            'cc_last_name' => 'Corporate',
            'email' => auth()->user()->email,
            'cc_phone_number' => auth()->user()->corporate->country->country_code,
            'phone_number' => auth()->user()->corporate->mobile_number,
            'billing_address' => Setting::where('key', 'address-1')->first()['value'],

            'city' => 'Jadda',
            'state' => 'Capital',
            'postal_code' => '21589',
            'country' => 'SAU',
            'address_shipping' => auth()->user()->corporate->address_en,
            'city_shipping' => 'Jeddah',
            'state_shipping' => 'Capital',
            'postal_code_shipping' => '21589',
            'country_shipping' => 'SAU',
            'products_per_title' => $Package->name_en,
            'currency' => 'SAR',
            'unit_price' => $Package->price,
            'quantity' => '1',
            'other_charges' => '0',
            'amount' => $Package->price,
            'discount' => '0',
            'msg_lang' => 'english',
            'reference_no' => '123456',
            'site_url' => 'https://www.smartappco.com/',
            'return_url' => route('paytabschecker'),
            // env('ADMIN_URL').'/'.  Nova::path() . '/resources/packages/'.$package_id,
            'cms_with_version' => 'API USING PHP',
        ]);

        if ($result->response_code == 4012) {
            // /dd($result);
            \Session::put('check_id', $result->p_id);

            //  dd($result);
            return redirect($result->payment_url);
        }

        // dd($result);
        return $result->result;
    }

    public function checkPayWithPaytabs(Request $request)
    {
        $package = \Session::get('Package');
        $email = env('PAYTABS_EMAIL');
        $secret = env('PAYTABS_SECRET');

        $check_id = \Session::get('check_id');

        $pt = Paytabs::getInstance($email, $secret);
        $result = $pt->verify_payment($check_id);

        if ($result->response_code == 4001) {
            session(['error_payment' => 'Missing payment reference number.']);

            return redirect(Nova::path().'/resources/packages/'.$package->id);
        }
        // Payment Success
        if ($result->response_code == 100) {

            \App\Payment::create([
                'payment_gateway' => 'paytabs',
                'corporate_id' => auth()->user()->corporate_id,
                'user_id' => null,
                'result' => json_encode($result),

            ]);

            $Subscription = Subscription::create([
                'package_id' => $package->id,
                'corporate_id' => auth()->user()->corporate->id,
                'user_id' => null,
                'subscriber' => 2,
                'created_from' => 'Package',
            ]);

            $level = 'success';
            $message = 'Package "'.$package->name_en.'"Was Paid Successfully By '.auth()->user()->name.' ('.auth()->user()->corporate->name_en.')';
            $corporate_message = 'Package "'.$package->name_en.'"Was Paid Successfully.';
            $url = Nova::path().'/resources/packages/'.$package->id;
            Auth()->User()->notify(new BroadcastNotification($level, $corporate_message, $url));

            $Users = User::superAdmin()->get();
            foreach ($Users as $user) {
                $user->notify(new BroadcastNotification('info', $message, $url));
            }

            $request->session()->put('success_payment', 'Payment successful.');

            return redirect($url);

        } else { // if failed
            // dd($result);

            \App\Payment::create([
                'payment_gateway' => 'paytabs',
                'corporate_id' => auth()->user()->corporate_id,
                'user_id' => null,
                'result' => json_encode($result),

            ]);

            session(['error_payment' => 'Invoice is not paid! Reference# is '.$result->pt_invoice_id]);

            $level = 'error';
            $message = 'Package "'.$package->name_en.'"Was Paid Faild By '.auth()->user()->name.' ('.auth()->user()->corporate->name_en.')';
            $corporate_message = 'Package "'.$package->name_en.'"Was Paid Failed.';
            $url = Nova::path().'/resources/packages/'.$package->id;
            Auth()->User()->notify(new BroadcastNotification($level, $corporate_message, $url));
            Auth()->User()->notify(new BroadcastNotification($level, 'Invoice is not paid! Reference# is '.$result->pt_invoice_id, $url));

            $Users = User::superAdmin()->get();
            foreach ($Users as $user) {
                $user->notify(new BroadcastNotification($level, $message, $url));
                $user->notify(new BroadcastNotification($level, 'Invoice is not paid! Reference# is '.$result->pt_invoice_id.' By '.auth()->user()->corporate->name_en, $url));
            }

            return redirect(Nova::path().'/resources/packages/'.$package->id);
        }

        return $result->result;
    }

    public function payWithpaypal(Request $request)
    {

        $Package = Package::find(base64_decode($request->get('p')));

        \Session::forget('Package');
        \Session::forget('corporate_id');
        \Session::put('Package', $Package);
        \Session::put('package_id', base64_decode($request->get('p')));
        \Session::put('corporate_id', auth()->user()->corporate_id);

        $user_id = Auth()->user()->id;
        $user_id = Auth()->user()->id;
        $Price = (int) ltrim($Package->price, ' - '.env('CURRENCY'));

        $payer = new Payer;
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item;
        $item_1->setName($Package->name_en)
            /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($Price);
        /** unit price **/
        $item_list = new ItemList;
        $item_list->setItems([$item_1]);

        // Disable all irrelevant PayPal aspects in payment
        $inputFields = new InputFields;
        $inputFields->setAllowNote(true)
            ->setNoShipping(1)
            ->setAddressOverride(0);
        $webProfile = new WebProfile;
        $webProfile->setName(uniqid())
            ->setInputFields($inputFields)
            ->setTemporary(true);
        $createProfile = $webProfile->create($this->apiContext);

        $amount = new Amount;
        $amount->setCurrency('USD')
            ->setTotal($Price);

        $transaction = new Transaction;
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($Package->description_en);
        $redirect_urls = new RedirectUrls;

        $redirectURLs = new RedirectUrls;
        $redirectURLs->setReturnUrl(URL::to('status'))
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment;
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions([$transaction]);

        $payment = new Payment;
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectURLs)
            ->setTransactions([$transaction]);
        $payment->setExperienceProfileId($createProfile->getId());

        try {
            $payment->create($this->apiContext);
        } catch (\Exception $ex) {
            \Log::info($ex);
            // \Session::put('error_payment', $ex['message']);
            //  dd($ex);
        }
        // $payment->create($this->apiContext);
        // dd($payment);

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirectURL = $link->getHref();
                break;
            }
        }

        // We store the payment ID into the session

        \Session::put('paypalPaymentId', $payment->getId());
        if (isset($redirectURL)) {
            return Redirect::away($redirectURL);
        }
        \Session::put('error', 'There was a problem processing your payment. Please contact support.');

        return Redirect::route('paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {

        // dd('test test status');
        /** Get the payment ID before session clear **/
        $payment_id = \Session::get('paypalPaymentId');
        $package_id = \Session::get('package_id');
        $Package = \Session::get('Package');
        /** clear the session payment ID **/
        \Session::forget('paypalPaymentId');
        if (empty($request->get('PayerID')) || empty($request->get('token'))) {

            // \Session::put('error_payment', 'Payment failed');
            session(['error_payment' => 'Payment Failed.']);

            $level = 'error';
            $message = 'Package "'.$Package->name_en.'"Was Paid Faild By '.auth()->user()->name;
            $corporate_message = 'Package "'.$Package->name_en.'"Was Paid Failed.';
            $url = Nova::path().'/resources/packages/'.$package_id;
            Auth()->User()->notify(new BroadcastNotification($level, $corporate_message, $url));
            $Users = User::superAdmin()->get();
            foreach ($Users as $user) {
                $user->notify(new BroadcastNotification($level, $message, $url));
            }

            return redirect(Nova::path().'/resources/packages/'.$package_id);
        }

        $payment = Payment::get($payment_id, $this->apiContext);

        $execution = new PaymentExecution;

        try {
            $execution->setPayerId($request->get('PayerID'));
        } catch (\Exception $ex) {
            \Log::info($ex);
            // \Session::put('error_payment', $ex['message']);
        }

        $url = Nova::path().'/resources/packages/'.$package_id;
        try {

            $result = $payment->execute($execution, $this->apiContext);
            if ($result->getState() == 'approved') {

                $Subscription = Subscription::create([
                    'package_id' => $Package->id,
                    'corporate_id' => auth()->user()->corporate->id,
                    'user_id' => null,
                    'subscriber' => 2,
                    'created_from' => 'Package',
                ]);

                $level = 'success';
                $message = 'Package "'.$Package->name_en.'"Was Paid Successfully By '.auth()->user()->name;
                $corporate_message = 'Package "'.$Package->name_en.'"Was Paid Successfully.';
                $url = Nova::path().'/resources/packages/'.$package_id;
                Auth()->User()->notify(new BroadcastNotification($level, $corporate_message, $url));

                $Users = User::superAdmin()->get();
                foreach ($Users as $user) {
                    $user->notify(new BroadcastNotification('info', $message, $url));
                }

                $request->session()->put('success_payment', 'Payment successful.');

                return redirect($url);
            }

            \Session::put('error_payment', 'Payment failed!');

            return redirect($url);
        } catch (\Exception $ex) {
            if (\Config::get('app.debug')) {
                \Log::info($ex);
                \Session::put('error_payment', 'Transaction is declined due to compliance violation !');

                return redirect($url);
            } else {
                \Session::put('error_payment', 'Some error occur, sorry for inconvenient');

                return redirect($url);
            }
        }
    }
}
