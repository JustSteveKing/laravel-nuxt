<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Role $resource
 */
final class RoleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'label' => $this->resource->label,
            'permission' => PermissionResource::collection(
                resource: $this->whenLoaded(
                    relationship: 'permissions',
                ),
            ),
        ];
    }
}
