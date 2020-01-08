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
use niklasravnsborg\LaravelPdf\Pdf;


class PDFController extends Controller
{

    public function __construct()
    {
    }

    public function receipt(Request $request)
    {
        $post = Post::find(base64_decode($request->get('p')));
        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('Pdf.receipt', $post);
        return $pdf->stream('document.pdf');

        // $pdf->loadView('Pdf.receipt', compact('post'));
        // return $pdf->stream();
    }

    public function qrcodepdf(Request $request)
    {
        $models =  session()->get('models');
        $pdf = App::make('dompdf.wrapper');
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->loadView('Pdf.qrcode', compact('models'));
        return $pdf->download(now() . '_QR_CODE.pdf');
    }


    public function assignqrcodepdf(Request $request)
    {
        $assignqrcode = AssignQrcode::find(base64_decode($request->get('p')));
        logger($assignqrcode);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Pdf.assignqrcode', compact('assignqrcode'));


        return $pdf->stream();
    }
}
