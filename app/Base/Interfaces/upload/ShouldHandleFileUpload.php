<?php

namespace App\Base\Interfaces\upload;

use Illuminate\Http\UploadedFile;

interface ShouldHandleFileUpload
{
    public function exist(string $file): bool;
    public function remove(string $file): void;
    public function upload(string $disk, UploadedFile $uploadedFile): string;
}
