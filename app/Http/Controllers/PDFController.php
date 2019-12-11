<?php

namespace App\Http\Controllers;

use URL;
use App\Post;
use App\User;
use App\Qrcode;
use App\Package;
use Carbon\Carbon;
use PayPal\Api\Item;
use App\AssignQrcode;
use App\Subscription;
use PayPal\Api\Payer;
use Laravel\Nova\Nova;
use PayPal\Api\Amount;
use App\GenerateQrcode;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use PayPal\Api\WebProfile;

use PayPal\Api\InputFields;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use League\Flysystem\Config;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Jobs\GenerateAndAssigneQrcodeJob;
use Illuminate\Support\Facades\App;
use App\Notifications\BroadcastNotification;

 

class PDFController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function receipt(Request $request)
    {
        $post = Post::find(base64_decode($request->get('p')));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Pdf.receipt', compact('post'));
        return $pdf->stream();
    }


 
}
