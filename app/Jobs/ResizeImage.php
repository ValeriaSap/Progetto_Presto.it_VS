<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $w;
    private $h;
    private $fileName;
    private $path;
    

    /**
     * Create a new job instance.
     */
    public function __construct($filePath,$h,$w){
        $this->path = dirname($filePath);
        $this->fileName =basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }
   
    /**
     * Execute the job.
     * 
     */
 
    public function handle()
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop_{$w}x{$h}_" . $this->fileName;

        $croppedImage = Image::load($srcPath)
                        ->crop(Manipulations::CROP_CENTER, $w, $h)
                        ->watermark('public/media/logo.png')
                        ->watermarkOpacity(50)
                        ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
                        ->watermarkPadding(10, 10, Manipulations::UNIT_PERCENT)
                        ->watermarkHeight(20, Manipulations::UNIT_PERCENT)
                        ->watermarkWidth(40, Manipulations::UNIT_PERCENT)
                        ->save($destPath);

       
    }
}
