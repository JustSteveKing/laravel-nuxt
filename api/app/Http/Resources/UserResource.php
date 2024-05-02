<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property User|Authenticatable $resource
 */
final class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'roles' => RoleResource::collection(
                resource: $this->whenLoaded(
                    relationship: 'roles',
                ),
            ),
            'created' => new DateResource(
                resource: $this->resource->created_at,
            ),
        ];
    }
}
