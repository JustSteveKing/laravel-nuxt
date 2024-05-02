<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Users;

use App\Http\Resources\UserResource;
use App\Http\Responses\CollectionResponse;
use App\Services\UserService;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

final readonly class IndexController
{
    public function __construct(
        private UserService $service,
    ) {
    }

    public function __invoke(Request $request): Responsable
    {
        return new CollectionResponse(
            data: UserResource::collection(
                resource: $this->service->all(),
            )
        );
    }
}
