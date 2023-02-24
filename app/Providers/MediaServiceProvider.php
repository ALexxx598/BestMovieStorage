<?php

namespace App\Providers;

use App\StorageDomain\Media\Service\FirebaseMediaService;
use App\StorageDomain\Media\Service\MediaServiceInterface;
use App\StorageDomain\Media\Storage\FirebaseMediaStorage;
use App\StorageDomain\Media\Storage\MediaStorageInterface;
use Illuminate\Support\ServiceProvider;

class MediaServiceProvider extends ServiceProvider
{
    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->registerMediaService();

        $this->registerMediaStorage();
    }

    private function registerMediaService(): void
    {
        $this->app->singleton(MediaServiceInterface::class, FirebaseMediaService::class);
    }

    private function registerMediaStorage(): void
    {
        $this->app->singleton(MediaStorageInterface::class, FirebaseMediaStorage::class);
    }
}
