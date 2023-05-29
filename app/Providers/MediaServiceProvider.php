<?php

namespace App\Providers;

use App\StorageDomain\Media\RestrictionFactory\MediaRestrictionFactory;
use App\StorageDomain\Media\RestrictionFactory\MediaRestrictionFactoryInterface;
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
        $this->registerMediaRestrictionFactory();

        $this->registerMediaStorage();

        $this->registerMediaService();
    }

    private function registerMediaService(): void
    {
        $this->app->singleton(MediaServiceInterface::class, FirebaseMediaService::class);
    }

    private function registerMediaStorage(): void
    {
        $this->app->singleton(MediaStorageInterface::class, FirebaseMediaStorage::class);
    }

    private function registerMediaRestrictionFactory()
    {
        $this->app->singleton(MediaRestrictionFactoryInterface::class, MediaRestrictionFactory::class);
    }
}
