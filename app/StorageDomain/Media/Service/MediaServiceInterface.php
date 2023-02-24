<?php

namespace App\StorageDomain\Media\Service;

use App\StorageDomain\Media\Payload\MediaSavedPayload;
use App\StorageDomain\Media\Payload\MediaUploadPayload;

interface MediaServiceInterface
{
    /**
     * @param MediaUploadPayload $payload
     * @return MediaSavedPayload
     */
    public function upload(MediaUploadPayload $payload): MediaSavedPayload;

    /**
     * @param string $path
     * @return string
     */
    public function getFileUrl(string $path): string;
}
