<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserBrandPivotResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->pivot->id,
            'vehicle_type' => VehicleTypeResource::make($this->resource->pivot->vehicleType),
            'brand' => BrandResource::make($this->resource),
            'model' => $this->resource->pivot->model,
            'bike_photo' => $this->resource->pivot->bike_photo ? Storage::url($this->resource->pivot->bike_photo) : null,
        ];
    }
}
