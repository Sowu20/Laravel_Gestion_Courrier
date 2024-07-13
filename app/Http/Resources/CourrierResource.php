<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourrierResource extends JsonResource
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
            'date_envoi' => $this->date_envoi,
            'date_reception' => $this->date_reception,
            'objet_cour' => $this->objet_cour,
            'description_cour' => $this->description_cour,
            'statut_cour' => $this->statut_cour,
            'expediteur' => $this->whenLoaded('expediteur', function () {
                return [
                    'nom_exp' => $this->expediteur->nom_exp ?? null,
                ];
            }),
            'destinataire' => $this->whenLoaded('destinataire', function () {
                return [
                    'nom_des' => $this->destinataire->nom_des ?? null,
                ];
            }),
        ];
    }
}
