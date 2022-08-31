<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListFormController extends Controller
{
    public function index(){
 
        // $list = DB::table('EL_formulaires')->paginate(4);
   
        $list = DB::table('El_AFFECTFORMUSERS')
            ->join('D_UTILISATEUR', 'D_UTILISATEUR.id', '=', 'El_AFFECTFORMUSERS.user_id')
            ->join('EL_FORMULAIRES', 'El_AFFECTFORMUSERS.id_form', '=', 'EL_FORMULAIRES.id')
            ->select('D_UTILISATEUR.NomComplet', 'EL_FORMULAIRES.title','EL_FORMULAIRES.description','EL_FORMULAIRES.href','EL_FORMULAIRES.id')
            ->where('D_UTILISATEUR.id',auth()->user()->id)
            ->paginate(4);
            if(empty($list)){
                return "no data found";
            }
        return $list;
    }
    function sidelist(){
         
        $list = DB::table('El_AFFECTFORMUSERS')
        ->join('D_UTILISATEUR', 'D_UTILISATEUR.id', '=', 'El_AFFECTFORMUSERS.user_id')
        ->join('EL_FORMULAIRES', 'El_AFFECTFORMUSERS.id_form', '=', 'EL_FORMULAIRES.id')
        ->select('D_UTILISATEUR.NomComplet', 'EL_FORMULAIRES.title','EL_FORMULAIRES.description','EL_FORMULAIRES.href','EL_FORMULAIRES.id')
        ->where('D_UTILISATEUR.id',auth()->user()->id)
        ->get();
         return $list;
    }
}
