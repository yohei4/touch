<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantdataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'restaurant_name' => $this->restaurant_name,
            'postal_code' => $this->postal_code,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'address_3' => $this->address_3,
            'address_4' => $this->address_4,
            'tel' => $this->tel,
            'table_count' => $this->table_count,
            'comment' => $this->comment,
            'logo' => $this->logo
        ];
    }
}
