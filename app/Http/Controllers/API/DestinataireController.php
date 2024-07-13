<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destinataire;
use App\Http\Resources\DestinataireResource;

class DestinataireController extends Controller
{
    //Afficher tous les destinataires
    public function index()
    {
        $destinataires = Destinataire::get();
        return DestinataireResource::collection($destinataires);
    }

    //Afficher un destinataire
    public function show($id)
    {
        $destinataire = Destinataire::where("id", $id)->first();
        $retour = [
            "status" => true,
            "data" => $destinataire
        ];
        return response()->json($retour, 200);
    }

    //Enregistrer un destinataire
    public function store(Request $request)
    {
        $input = $request->all();
        $destinataire = Destinataire::create([
            'nom_des' => $input['nom_des'],
            'prenom_des' => $input['prenom_des'],
            'adr_des' => $input['adr_des'],
            'entreprise_des' => $input['entreprise_des'],
        ]);
        return new DestinataireResource($destinataire);
    }

    //Modifier un destinataire
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $destinataire = Destinataire::find($id);
        if(empty($destinataire)){
            return response()->json(["message" => "Ce destinataire n'existe pas"], 200);
        }
        $destinataire->nom_des = $input["nom_des"];
        $destinataire->prenom_des = $input["prenom_des"];
        $destinataire->adr_des = $input["adr_des"];
        $destinataire->entreprise_des = $input["entreprise_des"];
        $destinataire->save();

        $retour = [
            "status" => true,
            "data" => $destinataire,
            "message" => "Element mise à jour avec succès"
        ];
        return response()->json($retour, 200);
    }

    //Supprimer le destinataire
    public function delete($id)
    {
        $destinataire = Destinataire::find($id);
        if(empty($destinataire)){
            return response()->json(["message" => "Ce destinataire n'existe pas"], 200);
        }
        $destinataire->delete();
        $retour = [
            "status" => true,
            "description" => "Suppression effectuée"
        ];
        return response()->json($retour, 200);
    }
}
