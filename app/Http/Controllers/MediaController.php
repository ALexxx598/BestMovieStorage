<?php

namespace App\Http\Controllers;

use App\Http\Request\Media\MediaUploadRequest;
use App\Http\Resource\Media\MediaUploadResource;
use App\StorageDomain\Media\MediaTypeEnum;
use App\StorageDomain\Media\Payload\MediaUploadPayload;
use App\StorageDomain\Media\Service\MediaServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class MediaController extends Controller
{
    /**
     * @param MediaServiceInterface $mediaService
     */
    public function __construct(
        private MediaServiceInterface $mediaService
    ) {
    }

    /**
     * @param MediaUploadRequest $request
     * @return JsonResponse
     */
    public function upload(MediaUploadRequest $request): JsonResponse
    {
        $payload = MediaUploadPayload::make(
            userId: $request->getUserId(),
            type: MediaTypeEnum::tryFrom($request->getMediaType()),
            file: $request->getMediaFile()
        );

        return response()->json([
            'status' => Response::HTTP_CREATED,
            'data' => MediaUploadResource::make($this->mediaService->upload($payload))
        ], Response::HTTP_CREATED);
    }
}
