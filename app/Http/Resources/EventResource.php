<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

/**
 * @mixin \App\Models\Event
 */
class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);

        $data['name'] = $this->resource->name;
        $data['description'] = $this->resource->description;
        $data['agenda'] = $this->resource->agenda;
        $data['city'] = $this->resource->city;
        $data['attendees_count'] = $this->users->count();

        if (isset($data['users'])) {
            $data['users'] = UserResource::collection($this->resource->users);
        }

        if (isset($data['interests'])) {
            $data['interests'] = InterestResource::collection($this->resource->interests);
        }

        if (isset($data['city'])) {
            $data['city'] = CityResource::make($this->resource->city);
        }

        return $data;
    }
}
