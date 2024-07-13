<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpediteurResource extends JsonResource
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
            'nom_exp' => $this->nom_exp,
            'prenom_exp' => $this->prenom_exp,
            'adr_exp' => $this->adr_exp,
            'entreprise_exp' => $this->entreprise_exp
        ];
    }
}
