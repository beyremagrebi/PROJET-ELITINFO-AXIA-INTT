<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ElPretperso;
use App\Models\ElDemandes;
use Illuminate\Support\Facades\DB;
class ReclamationPretController extends Controller
{

        /**
     * Update the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $etape = DB::table('EL_FORMETAPES')->where('id_form', 1)->first();
    
       if($etape->activeEtape1==true){
        $statu="EnCours";
        $etapeCourant=$etape->intituleEtape1;
        $etapeSuivante=$etape->intituleEtape2;
       }   
       else{
        return "non activé";
       }
        $rec=ElPretperso::create([
             'description'=>$request->description,
             'periode_paiment'=>$request->mois,
             'montant'=>$request->montant,
        ]);
        $demande=ElDemandes::create([
            'id_form'=>1,
           'id_doc'=>$rec->id,
           'user_id'=>$request->selected,
           'DateDemande'=>$rec->created_at,
           'EtapeEncours'=>$etapeCourant,
           'EtapeSuivante'=>$etapeSuivante,
           'Status'=>$statu
         ]);
    return "success";
    }
}
