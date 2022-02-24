<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfigResource extends JsonResource
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
            'user' => new UserResource($this->whenLoaded('user')),
            'cpu' => new CPUResource($this->whenLoaded('cpu')),
            'cooling' => new CoolingResource($this->whenLoaded('cooling')),
            'case' => new CaseResource($this->whenLoaded('case')),
            'gpu' => new GPUResource($this->whenLoaded('gpu')),
            'hdd' => new HDDResource($this->whenLoaded('hdd')),
            'motherboard' => new MotherBoardResource($this->whenLoaded('motherboard')),
            'ssd' => new SSDResource($this->whenLoaded('ssd')),
            'ram' => new RAMResource($this->whenLoaded('ram')),
            'case' => new CaseResource($this->whenLoaded('boitier')),
        ];
    }
}
