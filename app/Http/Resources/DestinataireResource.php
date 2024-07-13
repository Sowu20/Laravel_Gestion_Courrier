<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class DestinataireResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'nom_des' => $this->nom_des,
            'prenom_des' => $this->prenom_des,
            'adr_des' => $this->adr_des,
            'entreprise_des' => $this->entreprise_des
        ];
    }
}
