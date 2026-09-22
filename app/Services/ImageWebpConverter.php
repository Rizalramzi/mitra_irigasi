<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ImageWebpConverter
{
    /**
     * Convert an uploaded image to .webp format and store it on the specified disk directory.
     *
     * @param TemporaryUploadedFile|UploadedFile $file
     * @param string $directory (e.g., 'products')
     * @param string $disk (e.g., 'public')
     * @param int $quality (1-100)
     * @return string Relative stored file path (e.g. 'products/random_name.webp')
     */
    public static function convertAndStore(
        TemporaryUploadedFile|UploadedFile $file,
        string $directory = 'products',
        string $disk = 'public',
        int $quality = 85
    ): string {
        $realPath = $file->getRealPath();

        // Use Laravel's Storage disk path resolution (works with Storage::fake in tests as well)
        $targetDirectory = Storage::disk($disk)->path($directory);

        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }

        $filename = Str::random(40) . '.webp';
        $targetPath = $targetDirectory . DIRECTORY_SEPARATOR . $filename;

        // Try reading image with GD
        $imageData = file_get_contents($realPath);
        $image = @imagecreatefromstring($imageData);

        if ($image !== false) {
            // Preserve alpha transparency for PNG/WebP if applicable
            imagepalettetotruecolor($image);
            imagealphablending($image, true);
            imagesavealpha($image, true);

            // Save as WebP
            imagewebp($image, $targetPath, $quality);
            imagedestroy($image);
        } else {
            // Fallback: if GD fails to parse, copy original file directly
            copy($realPath, $targetPath);
        }

        return trim($directory, '/\\') . '/' . $filename;
    }
}
