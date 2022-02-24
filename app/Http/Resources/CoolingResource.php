<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoolingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'bruit' => $this->bruit,
            'format' => $this->format,
            'marque' => $this->marque,
            'matériaux' => $this->matériaux,
            'description' => $this->description,
            'nom' => $this->nom,
            'socket' => $this->socket,
            'type' => $this->type,
            'image' => $this->image
        ];
    }
}
