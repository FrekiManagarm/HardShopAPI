<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CaseResource extends JsonResource
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
            'image' => $this->image,
            'RGB' => $this->RGB,
            'alim_inclus' => $this->alim_inclus,
            'couleur' => $this->couleur,
            'description' => $this->description,
            'facade_laterale' => $this->facade_laterale,
            'format' => $this->format,
            'nom' => $this->nom,
            'ventilateur' => $this->ventilateur,
        ];
    }
}
