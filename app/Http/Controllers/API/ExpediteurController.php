<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expediteur;
use App\Http\Resources\ExpediteurResource;

class ExpediteurController extends Controller
{
    //Afficher tous les expéditeurs
    public function index()
    {
        $expediteurs = Expediteur::get();
        return ExpediteurResource::collection($expediteurs);
    }

    //Afficher un expediteur
    public function show($id)
    {
        $expediteur = Expediteur::where("id", $id)->first();
        $retour = [
            "status" => true,
            "data" => $expediteur
        ];
        return response()->json($retour, 200);
    }

    //Enregistrer un expediteur
    public function store(Request $request)
    {
        $input = $request->all();
        $expediteur = Expediteur::create([
            'nom_exp' => $input['nom_exp'],
            'prenom_exp' => $input['prenom_exp'],
            'adr_exp' => $input['adr_exp'],
            'entreprise_exp' => $input['entreprise_exp'],
        ]);
        return new ExpediteurResource($expediteur);
    }

    //Modifier un expéditeur
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $expediteur = Expediteur::find($id);
        if(empty($expediteur)){
            return response()->json(["message" => "Ce expéditeur n'existe pas"], 200);
        }
        $expediteur->nom_exp = $input["nom_exp"];
        $expediteur->prenom_exp = $input["prenom_exp"];
        $expediteur->adr_exp = $input["adr_exp"];
        $expediteur->entreprise_exp = $input["entreprise_exp"];
        $expediteur->save();

        $retour = [
            "status" => true,
            "data" => $expediteur,
            "message" => "Element mise à jour avec succès"
        ];
        return response()->json($retour, 200);
    }

    //Supprimer l'expéditeur
    public function delete($id)
    {
        $expediteur = Expediteur::find($id);
        if(empty($post)){
            return response()->json(["message" => "Ce expéditeur n'existe pas"], 200);
        }
        $expediteur->delete();
        $retour = [
            "status" => true,
            "description" => "Suppression effectuée"
        ];
        return response()->json($retour, 200);
    }
}
