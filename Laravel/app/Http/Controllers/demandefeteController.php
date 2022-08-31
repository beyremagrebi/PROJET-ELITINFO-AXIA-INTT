<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ElDemandes;
use App\Models\ElDemandefete;

class demandefeteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etape = DB::table('EL_FORMETAPES')->where('id_form', 13)->first();
    
        if($etape){
      
             if($etape->activeEtape1==true){
              $statu="EnCours";
              $etapeCourant=$etape->intituleEtape1;
              $etapeSuivante=$etape->intituleEtape2;
             }   
             else{
              return "formulaire n'est pas activé";
             }
        }
        else{
            return "formulaire n'est pas activé";
        }

        $rec=ElDemandefete::create([
             'typedemande'=>$request->selected,
             'raisonfete'=>$request->raisonfete,
             'montant'=>$request->montant,
        ]);
      ElDemandes::create([
            'id_form'=>13,
           'id_doc'=>$rec->id,
           'user_id'=>$request->user_id,
           'DateDemande'=>$rec->created_at,
           'EtapeEncours'=> $etapeCourant,
           'EtapeSuivante'=>$etapeSuivante,
           'Status'=>$statu
         ]);
    return "success";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
