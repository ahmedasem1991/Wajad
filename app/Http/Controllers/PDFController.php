<?php

namespace App\Http\Controllers;

use App\Setting;
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
        $settings = Setting::all()->pluck('value','key')->toArray();
        $data=['post'=>$post, 'settings'=>$settings];
        // $pdf = (new PdfWrapper)->loadView('Pdf.receipt', ['post' => $post]);
        $pdf = \DomPDF::loadView('Pdf.en_receipt', $data);

        // $dispatcher = Post::getEventDispatcher();
        // Post::unsetEventDispatcher();
        // $post->open_status = 0;
        // $post->save();
        // Post::setEventDispatcher($dispatcher);

        return $pdf->stream('document.pdf');
    }
    public function arReceipt(Request $request)
    {
        $post = Post::find(base64_decode($request->get('p')));
        $settings = Setting::all()->pluck('value','key')->toArray();

        // $dispatcher = Post::getEventDispatcher();
        // Post::unsetEventDispatcher();
        // $post->open_status = 0;
        // $post->save();
        // Post::setEventDispatcher($dispatcher);

        return view('Pdf.ar_receipt', compact('post', 'settings'));
    }

    public function qrcodepdf(Request $request)
    {
        $models =  session()->get('models');
        $settings = Setting::all()->pluck('value','key')->toArray();
        //  $pdf = (new PdfWrapper)->loadView('Pdf.qrcode', ['models' => $models]);
        $data=['models' => $models, 'settings' => $settings];
        set_time_limit(9000);
        $pdf = \DomPDF::loadView('Pdf.qrcode', $data);
        return $pdf->download(now() . '_QR_CODE.pdf');
    }

    public function qrcodeZIP(Request $request)
    {
        $public_dir=public_path();
        $zipFileName = 'QR-Codes.zip';
        $filetopath=$public_dir.'/'.$zipFileName;
        $headers = array(
            'Content-Type' => 'application/zip',
            "Pragma" =>"public",
            "Expires" =>"0" ,
            "Cache-Control" =>"must-revalidate, post-check=0, pre-check=0",
            "Cache-control" =>"public",
            "Content-Description" =>"File Transfer",
            "Content-type" =>"application/zip", 
             'Content-Disposition' =>'attachment; filename="'.basename($filetopath).'"',
            "Content-Transfer-Encoding" =>"binary",
          // "Content-Length: " . filesize($filetopath) ,
        );
        set_time_limit(3000);

        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }
    }

    public function assignqrcodepdf(Request $request)
    {
        $assignqrcode = AssignQrcode::find(base64_decode($request->get('p')));
        $settings = Setting::all()->pluck('value','key')->toArray();
        //logger($assignqrcode);
        //$pdf = (new PdfWrapper)->loadView('Pdf.assignqrcode', ['assignqrcode' => $assignqrcode]);
        $data=['assignqrcode' => $assignqrcode, 'settings' => $settings];
        $pdf = \DomPDF::loadView('Pdf.assignqrcode', $data);
        return $pdf->stream('document.pdf');
    }
}
