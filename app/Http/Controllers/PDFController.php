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
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Jobs\GenerateAndAssigneQrcodeJob;
use niklasravnsborg\LaravelPdf\PdfWrapper;
use App\Notifications\BroadcastNotification;
use niklasravnsborg\LaravelPdf\Pdf as PDF;



class PDFController extends Controller
{

    public function __construct()
    {
    }

    public function receipt(Request $request)
    {
        $post = Post::find(base64_decode($request->get('p')));
        $pdf = (new PdfWrapper)->loadView('Pdf.receipt', ['post' => $post]);
        return $pdf->stream('document.pdf');
    }

    public function qrcodepdf(Request $request)
    {
        $models =  session()->get('models');
        $pdf = (new PdfWrapper)->loadView('Pdf.qrcode', ['models' => $models]);
        return $pdf->download(now() . '_QR_CODE.pdf');
    }

    public function assignqrcodepdf(Request $request)
    {
        $assignqrcode = AssignQrcode::find(base64_decode($request->get('p')));
        logger($assignqrcode);
        $pdf = (new PdfWrapper)->loadView('Pdf.assignqrcode', ['assignqrcode' => $assignqrcode]);
        return $pdf->stream('document.pdf');      
    }
}
