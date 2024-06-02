<?php

namespace App\Http\Resources;

use App\Models\UserBrandPivot;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data['city_id'] = $this->resource->city_id;
        if (isset($this->resource->interests)) {
            $data['interests'] = InterestResource::collection($this->resource->interests);
        }

        if (isset($this->resource->dreamBikeBrand)) {
            $data['dream_bike_brand'] = BrandResource::make($this->resource->dreamBikeBrand);
        }

        if (isset($this->resource->dreamBikeType)) {
            $data['dream_bike_type'] = VehicleTypeResource::make($this->resource->dreamBikeType);
        }

        $data['dream_bike_model'] = $this->resource->model;

        if (isset($this->resource->events)) {
            $data['events'] = EventResource::collection($this->resource->events);
        }

        if (isset($this->resource->ownedBikes)) {
            $data['owned_bikes'] = UserBrandPivotResource::collection($this->resource->ownedBikes);
        }

        if (isset($this->resource->city)) {
            $data['city'] = CityResource::make($this->resource->city);
        }

        $data['model'] = $this->resource->model;

        return $data;
    }
}
