<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Image;

class ImageCompressionController extends Controller
{
    /**
     * Compress and convert an image to WebP format.
     *
     * @param string $inputImagePath  The path to the input image.
     * @param string $outputImagePath The path to save the compressed WebP image.
     * @param int    $quality         The image quality (0-100) for compression.
     */
    public function compressAndConvertToWebP($inputImagePath, $outputImagePath, $quality = 80)
    {
        // Load the image using Intervention Image
        $image = Image::make($inputImagePath);

        // Compress and convert to WebP format
        $image->encode('webp', $quality)->save($outputImagePath);
    }
}
