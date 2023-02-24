<?php

namespace App\StorageDomain\Media\RestrictionFactory;

use Illuminate\Http\UploadedFile;

interface MediaRestrictionInterface
{
    /**
     * @param \Illuminate\Http\UploadedFile $file
     */
    public function validate(UploadedFile $file): void;
}
