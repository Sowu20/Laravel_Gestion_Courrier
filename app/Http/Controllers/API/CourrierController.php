<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courrier;
use App\Http\Resources\CourrierResource;

class CourrierController extends Controller
{
    //Afficher tous les courriers
    public function index()
    {
        $courriers = Courrier::get();
        return CourrierResource::collection($courriers);
    }

    //Afficher un couurier
    public function show($id)
    {
        $courrier = Courrier::where("id", $id)->first();
        $retour = [
            "status" => true,
            "data" => $courrier
        ];
        return response()->json($retour, 200);
    }

    //Enregistrer un courrier
    public function store(Request $request)
    {
        $input = $request->all();
        $courrier = Courrier::create([
            'date_envoi' => $input['date_envoi'],
            'date_reception' => $input['date_reception'],
            'objet_cour' => $input['objet_cour'],
            'description_cour' => $input['description_cour'],
            'statut_cour' => $input['statut_cour'],
            'id_exp' => $input['id_exp'],
            'id_des' => $input['id_des']
        ]);
        return new CourrierResource($courrier);
    }

    //Modifier un courrier
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $courrier = Courrier::find($id);
        if(empty($courrier)){
            return response()->json(["message" => "Ce courrier n'existe pas"], 200);
        }
        $courrier->date_envoie = $input["date_envoi"];
        $courrier->date_reception = $input["date_reception"];
        $courrier->objet_cour = $input["objet_cour"];
        $courrier->description_cour = $input["description_cour"];
        $courrier->statut_cour = $input["statut_cour"];
        $courrier->id_exp = $input["id_exp"];
        $courrier->id_des = $input["id_des"];
        $courrier->save();

        $retour = [
            "status" => true,
            "data" => $courrier,
            "message" => "Element mise à jour avec succès"
        ];
        return response()->json($retour, 200);
    }

    //Supprimer le courrier
    public function delete($id)
    {
        $courrier = Courrier::find($id);
        if(empty($post)){
            return response()->json(["message" => "Ce courrier n'existe pas"], 200);
        }
        $courrier->delete();
        $retour = [
            "status" => true,
            "description" => "Suppression effectuée"
        ];
        return response()->json($retour, 200);
    }
}
