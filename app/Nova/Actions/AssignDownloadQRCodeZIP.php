<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\App;
use ZipArchive;

class AssignDownloadQRCodeZIP extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    { 

        $check_path=public_path().'/QR-Codes.zip';
    if(file_exists($check_path))
     unlink( $check_path);
        $public_dir=public_path();
        // Zip File Name
        $zipFileName = 'QR-Codes.zip';
        // Create ZipArchive Obj
        $zip = new ZipArchive;
        if ($zip->open($public_dir . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
        foreach ($models[0]->qrcodes as $key => $qrcode) {
          
                // Add File in ZipArchive

                $zip->addFile($public_dir . '/'. $qrcode->image,$qrcode->unique_reference_number.'.png');
                logger($public_dir . '/'. $qrcode->image);
                // Close ZipArchive     
              
            }
            $zip->close();
        }

        return Action::download(env('ADMIN_URL').'/qrcodezip', 'QR-Codes.zip');

     }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
