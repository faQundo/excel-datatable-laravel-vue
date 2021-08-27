<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Rate extends JsonResource
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
            'name' => $this->contract->name,
            'date' => $this->contract->date,
            'origin' =>$this->origin,
            'destination'=>$this->destination,
            'currency'=>$this->currency,
            'twenty'=>$this->twenty,
            'forty'=>$this->forty,
            'fortyhc'=>$this->fortyhc,
            ];
    }
}
