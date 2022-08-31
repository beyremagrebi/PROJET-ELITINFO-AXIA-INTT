<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class validationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result=[];
  
       if(auth()->user()->rolevalidateur) {
            $etapevalid=DB::table('EL_USERPROCESS')
            ->select('intituleEtape')
            ->where('idUser',auth()->user()->id)
            ->groupByRaw('intituleEtape')
            ->first();
                 
    

                    if( $etapevalid->intituleEtape=="validation Responsable"){
                        $doc = DB::table('El_ETAPE1')
                        ->join('D_UTILISATEUR','El_ETAPE1.user_id','=','D_UTILISATEUR.id')
                        ->select('El_ETAPE1.*','D_UTILISATEUR.NomComplet')
                        ->where('Status','EnCours','EtapeEncours')
                        ->orderBy('DateDemande','DESC')
                        ->paginate(2);
                    }
                    else if( $etapevalid->intituleEtape=="Validation RH"){
                        $doc = DB::table('El_ETAPE2')
                        ->join('D_UTILISATEUR','El_ETAPE2.user_id','=','D_UTILISATEUR.id')
                        ->select('El_ETAPE2.*','D_UTILISATEUR.NomComplet')
                        ->where('Status','EnCours','EtapeEncours')
                        ->orderBy('DateDemande','DESC')
                        ->paginate(2);
                    }
                    
       
                   array_push($result,(object) $doc);
                   


            

      
         


            return $result;
       }
        
         return "error";

          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($id,$table)
    {
        if(auth()->user()->rolevalidateur){
            $details = DB::table('EL_DEMANDES')
            ->join($table,'El_Demandes.id_doc',$table.'.id')
            ->join('D_UTILISATEUR', 'D_UTILISATEUR.id', '=', 'El_Demandes.user_id')
            ->join('el_formulaires','el_formulaires.id','=','EL_DEMANDES.id_form')
            ->select($table.'.*','D_UTILISATEUR.NomComplet','D_UTILISATEUR.matricule','El_Demandes.Status','el_formulaires.description as titleform','EL_DEMANDES.EtapeEncours')
            ->where('El_Demandes.id',$id)
            ->orderBy('id')
            ->first();

        
          
        }
        else{
            $details = DB::table('EL_DEMANDES')
            ->join($table,'El_Demandes.id_doc',$table.'.id')
            ->join('D_UTILISATEUR', 'D_UTILISATEUR.id', '=', 'El_Demandes.user_id')
            ->join('el_formulaires','el_formulaires.id','=','EL_DEMANDES.id_form')
            ->select($table.'.*','D_UTILISATEUR.NomComplet','D_UTILISATEUR.matricule','El_Demandes.Status','el_formulaires.description as titleform','EL_DEMANDES.EtapeEncours')
            ->where('El_Demandes.id',$id)
            ->where('d_utilisateur.id',auth()->user()->id)
            ->orderBy('id')
            ->first();
          
        }

        return  $details;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function refuse(Request $request)
    {
        $etapevalid=DB::table('EL_USERPROCESS')
        ->select('intituleEtape')
        ->where('idUser',auth()->user()->id)
        ->groupByRaw('intituleEtape')
        ->first();

        if($etapevalid->intituleEtape=="validation Responsable"){
            $affected = DB::table('EL_DEMANDES')
            ->where('id', $request->id)
            ->update([
                'EtapeEncours' => 'Refuse',
                'Status'=>'Refuse'
                
        ]);

        }
        else if($etapevalid->intituleEtape=="Validation RH"){
            $affected = DB::table('EL_DEMANDES')
            ->where('id', $request->id)
            ->update([
                'EtapeSuivante' => 'Refuse',
                'Status'=>'Refuse'
            ]);
        }


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
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request)
    {
        $demande=DB::table('EL_DEMANDES')
        ->where('id', $request->id)->first();

        $etape = DB::table('EL_FORMETAPES')
        ->where('id_form', $demande->id_form)->first();

        $etapevalid=DB::table('EL_USERPROCESS')
        ->select('intituleEtape')
        ->where('idUser',auth()->user()->id)
        ->groupByRaw('intituleEtape')
        ->first();

        if($etapevalid->intituleEtape=="validation Responsable"){
            if($etape->activeEtape2){
                if($etape->activeEtape3){
                    $etapeSuivante=$etape->intituleEtape3;
                }
                else{
                    $etapeSuivante='finish';
                 }
            }
            else{
                $etapeSuivante='finish';
             }

            $affected = DB::table('EL_DEMANDES')
            ->where('id', $request->id)
            ->update([
                'EtapeEncours' => $demande->EtapeSuivante,
                'EtapeSuivante' => $etapeSuivante,
                
        ]);

        }
        else if($etapevalid->intituleEtape=="Validation RH"){
            if($etape->activeEtape3){
                if($etape->activeEtape4){
                    $etapeSuivante=$etape->intituleEtape4;
                }
                else{
                    $etapeSuivante='finish';
                }
               
            }
            else{
               $etapeSuivante='finish';
            }
            DB::table('EL_DEMANDES')
            ->where('id', $request->id)
            ->update([
                'EtapeEncours' => $demande->EtapeSuivante,
                'EtapeSuivante'=>$etapeSuivante
            ]);
        }
        $demande=DB::table('EL_DEMANDES')
        ->where('id', $request->id)->first();
        if($demande->EtapeEncours=='finish' && $demande->EtapeSuivante=='finish' ){
           DB::table('EL_DEMANDES')
            ->where('id', $request->id)
            ->update([
                'Status' => 'Accepted',
            ]);
            
        }

              return "success";
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
