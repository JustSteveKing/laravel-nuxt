<?php

declare(strict_types=1);

namespace App\Http\Responses;

use App\Http\Factories\HeaderFactory;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

final readonly class CollectionResponse implements Responsable
{
    public function __construct(
        private ResourceCollection $data,
    ) {
    }

    public function toResponse($request): Response
    {
        return new JsonResponse(
            data: $this->data,
            headers: HeaderFactory::default(),
        );
    }
}
