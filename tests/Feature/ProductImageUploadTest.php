<?php

namespace Tests\Feature;

use App\Services\ImageWebpConverter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductImageUploadTest extends TestCase
{
    public function test_image_webp_converter_converts_jpg_to_webp(): void
    {
        Storage::fake('public');

        // Create a dummy JPEG image
        $width = 100;
        $height = 100;
        $image = imagecreatetruecolor($width, $height);
        $blue = imagecolorallocate($image, 0, 0, 255);
        imagefill($image, 0, 0, $blue);

        $tempPath = tempnam(sys_get_temp_dir(), 'test_img') . '.jpg';
        imagejpeg($image, $tempPath);
        imagedestroy($image);

        $file = new UploadedFile($tempPath, 'sample.jpg', 'image/jpeg', null, true);

        $storedPath = ImageWebpConverter::convertAndStore($file, 'products', 'public');

        // Assert extension is webp
        $this->assertStringEndsWith('.webp', $storedPath);

        // Assert file exists on public storage
        Storage::disk('public')->assertExists($storedPath);

        // Cleanup
        @unlink($tempPath);
    }

    public function test_public_storage_url_is_root_relative(): void
    {
        $url = Storage::disk('public')->url('products/test.webp');
        $this->assertEquals('/storage/products/test.webp', $url);
    }
}
