<?php

namespace App\StorageDomain\Media\Storage;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Kreait\Laravel\Firebase\Facades\Firebase;

class FirebaseMediaStorage implements MediaStorageInterface
{

    public function uploadFile(string $folderPath, UploadedFile $file, string $name): string
    {
        $image = Firebase::storage()
            ->getBucket()
            ->upload($file->getContent(), ['name' => $folderPath . $name]);

        return $image->info()['name'];
    }

    public function getFileUrl(string $path): string
    {
        return Firebase::storage()->getBucket()->object($path)->signedUrl(Carbon::tomorrow());
    }
}
