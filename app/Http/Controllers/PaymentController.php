<?php

namespace App\Http\Controllers;

use App\User;
use App\Qrcode;
use App\Package;
use Carbon\Carbon;
use App\AssignQrcode;
use App\Subscription;
use Laravel\Nova\Nova;
use App\GenerateQrcode;
use PayPal\Api\WebProfile;
use PayPal\Api\InputFields;
use League\Flysystem\Config;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Jobs\GenerateAndAssigneQrcodeJob;
use App\Notifications\BroadcastNotification;

use PayPal\Api\Item;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use URL;

use PayPal\Auth\OAuthTokenCredential;

class PaymentController extends Controller
{
    private $apiContext;
    public function __construct()
    {
        # Main configuration in constructor
        $paypalConfig = \Config::get('paypal');
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfig['client_id'],
                $paypalConfig['secret']
            )
        );
        $this->apiContext->setConfig($paypalConfig['settings']);
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
        $Price = (int) ltrim($Package->price, ' - ' . env('CURRENCY'));

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName($Package->name_en)
            /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($Price);
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        # Disable all irrelevant PayPal aspects in payment
        $inputFields = new InputFields();
        $inputFields->setAllowNote(true)
            ->setNoShipping(1)
            ->setAddressOverride(0);
        $webProfile = new WebProfile();
        $webProfile->setName(uniqid())
            ->setInputFields($inputFields)
            ->setTemporary(true);
        $createProfile = $webProfile->create($this->apiContext);


        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($Price);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($Package->description_en);
        $redirect_urls = new RedirectUrls();

        $redirectURLs = new RedirectUrls();
        $redirectURLs->setReturnUrl(URL::to('status'))
            ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirectURLs)
            ->setTransactions(array($transaction));
        $payment->setExperienceProfileId($createProfile->getId());
        $payment->create($this->apiContext);



        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirectURL = $link->getHref();
                break;
            }
        }
        # We store the payment ID into the session

        \Session::put('paypalPaymentId', $payment->getId());
        if (isset($redirectURL)) {
            return Redirect::away($redirectURL);
        }
        \Session::put('error', 'There was a problem processing your payment. Please contact support.');

        return Redirect::route('paywithpaypal');
    }


    public function getPaymentStatus(Request $request)
    {

        /** Get the payment ID before session clear **/
        $payment_id = \Session::get('paypalPaymentId');
        $package_id = \Session::get('package_id');
        $Package = \Session::get('Package');
        /** clear the session payment ID **/
        \Session::forget('paypalPaymentId');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            // \Session::put('error_payment', 'Payment failed');
            session(['error_payment' => 'Payment Failed.']);

            $level = 'error';
            $message = 'Package "' . $Package->name_en . '"Was Paid Faild By ' . auth()->user()->name;
            $corporate_message = 'Package "' . $Package->name_en . '"Was Paid Failed.';
            $url = Nova::path() . '/resources/packages/' . $package_id;
            Auth()->User()->notify(new BroadcastNotification($level, $corporate_message, $url));
            $Users = User::superAdmin()->get();
            foreach ($Users as $user) {
                $user->notify(new BroadcastNotification($level, $message, $url));
            }

            return redirect(Nova::path() . '/resources/packages/' . $package_id);
        }

        $payment = Payment::get($payment_id, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        try {

            $result = $payment->execute($execution, $this->apiContext);
            if ($result->getState() == 'approved') {

                $Subscription =   Subscription::create([
                    'package_id' => $Package->id,
                    'corporate_id' => auth()->user()->corporate->id,
                    'user_id' => Null,
                    'subscriber' => 2,
                    'created_from'=>'package'
                ]);

                $now = Carbon::now();

                $middle = $now->year . $now->month . $now->day . '-' . $now->hour . $now->minute;
                $generate_reference_number = NULL;
                $assign_reference_number = 'C-' . $middle . $now->second;
                $generate_id = NULL;

                if (count(Qrcode::status('In Stock')->type($Package->type)->get()) < $Package->quantity) {

                    $generate_reference_number = 'N-' . $middle . $now->second;
                    $GenerateQRCode = GenerateQrcode::create([
                        'generate_reference_number' => $generate_reference_number,
                        'type' => $Package->type,
                        'quantity' => $Package->quantity,
                        'created_by' => auth()->user()->id,
                        'created_from' => 'package',
                    ]);

                    $generate_id = $GenerateQRCode->id;
                }


                AssignQrcode::create([
                    'assign_reference_number' => $assign_reference_number,
                    'assign_to' => 2,
                    'user_id' => NULL,
                    'corporate_id' => \Session::get('corporate_id'),
                    'type' => $Package->type,
                    'available_period' => str_replace(" Day/s", "", $Package->period),
                    'quantity' => $Package->quantity,
                    'created_from' => 'package'
                ]);


                $QRcodesData = [
                    'generate_id' => $generate_id,
                    'generate_reference_number' => $generate_reference_number,
                    'assign_reference_number' => $assign_reference_number,
                    'quantity' => $Package->quantity,
                    'status' => 3,
                    'type' => $Package->type,
                    'user_id' => NULL,
                    'auth_id' => Auth()->User()->id,
                    'corporate_id' => \Session::get('corporate_id'),
                    'available_period' => str_replace(" Day/s", "", $Package->period),
                ];

                GenerateAndAssigneQrcodeJob::dispatch($QRcodesData);

                $level = 'success';
                $message = 'Package "' . $Package->name_en . '"Was Paid Successfully By ' . auth()->user()->name;
                $corporate_message = 'Package "' . $Package->name_en . '"Was Paid Successfully.';
                $url = Nova::path() . '/resources/packages/' . $package_id;
                Auth()->User()->notify(new BroadcastNotification($level, $corporate_message, $url));

                $Users = User::superAdmin()->get();
                foreach ($Users as $user) {
                    $user->notify(new BroadcastNotification('info', $message, $url));
                }

                $request->session()->put('success_payment', 'Payment successful.');
                return  redirect($url);
            }

            \Session::put('error_payment', 'Payment failed!');
            return redirect($url);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error_payment', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                \Session::put('error_payment', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }
    }
}
