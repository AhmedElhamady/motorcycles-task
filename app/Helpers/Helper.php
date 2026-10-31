<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class Helper
{
    public static function storeImage($image, $path)
    {
        // Ensure path consistency
        $directory = 'images/' . trim($path, '/');
        Storage::disk('public')->makeDirectory($directory);
        $fileName = uniqid('', true) . '.webp';

        $fileSize = $image->getSize();

        $manager = new ImageManager(new Driver());
        // Read and convert to WebP
        $img = $manager->read($image)->toWebp(quality: self::getWebpQuality($fileSize));

        Storage::disk('public')->put($directory . '/' . $fileName, (string) $img);

        return Storage::url($directory . '/' . $fileName);
    }

    protected static function getWebpQuality($size)
    {
        if ($size > 2 * 1024 * 1024) { // > 2MB
            return 65;
        } elseif ($size > 512 * 1024) { // > 500KB
            return 80;
        } elseif ($size > 256 * 1024) { // > 250KB
            return 85;
        }

        return 90; // small images keep higher quality
    }

    public static function updateImage($image, $oldImage, $path)
    {
        self::deleteImage($oldImage);

        return self::storeImage($image, $path);
    }

    public static function deleteImage($path)
    {
        if (blank($path)) {
            return;
        }

        $relativePath = str_replace('/storage/', '', $path);
        if (Storage::disk('public')->exists($relativePath)) {
            Storage::disk('public')->delete($relativePath);
        }
    }
}
