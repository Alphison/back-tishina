<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'preview' => $this->getPreviewImagePath(),
            'category' => new CategoryResource($this->category),
            'price' => $this->price,
            'address' => $this->address,
            'small_description' => $this->small_description,
        ];
    }
}
