<?php

namespace App\Api\Services;

use App\Api\Contracts\ImageStorageInterface;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
// use Spatie\ImageOptimizer\OptimizerChain;
// use ImageOptimizer;

class ImageStorageService implements ImageStorageInterface
{
    private const IMAGE_FOLDER = 'uploads/images/';

    public function uploadImage(UploadedFile $image, $resize = [], $path = "/", $thumnail = FALSE)
    {
        $fileName   = Str::random(5) . date("YmdHis") . '.' . $image->getClientOriginalExtension();

        // app(Spatie\ImageOptimizer\OptimizerChain::class)->optimize($image);
        // ImageOptimizer::optimize($image->getRealPath());

        $img = Image::make($image->getRealPath());

        if (count($resize) == 2) {
            //index 0= width, index 1 height
            $img->resize($resize[0], $resize[1]);
        } else if (count($resize) == 1) {
            $img->resize(
                $resize[0],
                null,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
        }

        $img->stream(); // <-- Key point

        // local disk
        Storage::disk('public')->put(
            self::IMAGE_FOLDER . $path . $fileName,
            $img->__toString(),
        );

        // S3
        // Storage::disk('s3')->put(
        //     $path . $fileName,
        //     $img->__toString(),
        //     'public'
        // );

        if ($thumnail) {
            $thumnail = Image::make($image->getRealPath());
            $thumnail->resize(480, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumnail->stream();

            // local disk
            Storage::disk('public')->put(
                self::IMAGE_FOLDER . $path . 'thumbnail-' . $fileName,
                $img->__toString(),
            );

            // S3
            // Storage::disk('s3')->put(
            //     $path . 'thumbnail-' . $fileName,
            //     $thumnail->__toString(),
            //     'public'
            // );
        }

        return $fileName;
    }


    // S3
    // public function getUrlS3($path)
    // {
    //     if ($path) {
    //         $s3 = Storage::disk('s3');
    //         return $s3->url($path);
    //     }
    //     return null;
    // }

    public function getUrl($path = NULL, $fileName = NULL, $defaultUrl = NULL)
    {
        // local disk
        $default = 'static/blank.png';
        $storage = Storage::disk('public');
        if (($fileName && $path) && $storage->exists(self::IMAGE_FOLDER . $path . $fileName)) {
            return $storage->url('images/' . $path . $fileName);
        }
        return $defaultUrl ?? asset('images/no-image.png');


        // S3
        // $default = 'static/blank.png';
        // if ($fileName && $path) {
        //     return $this->getUrlS3($path . $fileName);
        // }
        // return $this->getUrlS3($default);
    }

    public function deleteImage($image, $path, $thumnail = FALSE)
    {
        // local disk
        if ($thumnail) {
            if (Storage::disk('public')->exists(self::IMAGE_FOLDER . $path . 'thumbnail-' . $image)) {
                Storage::disk('public')->delete(self::IMAGE_FOLDER . $path . 'thumbnail-' . $image);
            }
        }
        if (Storage::disk('public')->exists(self::IMAGE_FOLDER . $path . $image)) {
            Storage::disk('public')->delete(self::IMAGE_FOLDER . $path . $image);
        }

        // S3
        // if ($thumnail) {
        //     Storage::disk('s3')->delete($path . 'thumbnail-' . $image);
        // }
        // Storage::disk('s3')->delete($path . $image);
    }
}
