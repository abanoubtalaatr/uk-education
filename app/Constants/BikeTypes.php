<?php

namespace App\Constants;

class BikeTypes
{
    /**
     * Get the list of bike types available
     *
     * @return array[]
     */
    public static function getTypes(): array
    {
        return [
            [
                "value" => "race",
                "name" => __("Race"),
            ],
            [
                "value" => "cruisers",
                "name" => __("Cruisers"),
            ],
            [
                "value" => "touring",
                "name" => __("Touring"),
            ],
        ];
    }
}
