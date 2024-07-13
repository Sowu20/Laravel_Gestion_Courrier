<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agentsc;
use App\Http\Resources\AgentSCResource;

class AgentSCController extends Controller
{
    //Afficher tous les agents de service courrier
    public function index()
    {
        $agents = Agentsc::get();
        return AgentSCResource::collection($agents);
    }

    //Afficher un service courrier
    public function show($id){
        $agent = Agentsc::where("id", $id)->first();
        $retour = [
            "status" => true,
            "data" => $agent
        ];
        return response()->json($retour, 200);
    }

    //Enregistrer un agent de service courrier
    public function store(Request $request){
        $input = $request->all();
        $agent = Agentsc::create([
            'nom_sc' => $input['nom_sc'],
            'description_sc' => $input['description_sc'],
            'adr_sc' => $input['adr_sc']
        ]);
        $retour = [
            "status" => true,
            "data" => $agent,
            "message" => "Service courrier créé avec succès"
        ];
        return response()->json($retour);
    }

    //Modifier un service courrier
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $agent = Agentsc::find($id);
        if(empty($agent)){
            return response()->json(["message" => "Ce service courrier n'existe pas"], 200);
        }
        $agent->nom_sc = $input["nom_sc"];
        $agent->description_sc = $input["description_sc"];
        $agent->adr_sc = $input["adr_sc"];
        $agent->save();

        $retour = [
            "status" => true,
            "data" => $agent,
            "message" => "Element mise à jour avec succès"
        ];
        return response()->json($retour, 200);
    }

    //SUpprimer un service couurier
    public function delete($id)
    {
        $agent = Agentsc::find($id);
        if(empty($agent)){
            return response()->json(["message" => "Ce service courrier n'existe pas"], 200);
        }
        $agent->delete();
        $retour = [
            "status" => true,
            "description" => "Suppression effectuée"
        ];
        return response()->json($retour, 200);
    }
}
