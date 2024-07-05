<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'house' => new HouseProfileResource($this->house),
            'check_in_date' => $this->check_in_date,
            'check_out_date' => $this->check_out_date,
        ];
    }
}
