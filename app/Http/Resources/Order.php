<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
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
            'id' => $this->id,
            'delivery_cost' => $this->delivery_cost,
            'items' => $this->items,
            'is_finished' => $this->is_finished,
            'created_at' => $this->created_at
        ];
    }
}
