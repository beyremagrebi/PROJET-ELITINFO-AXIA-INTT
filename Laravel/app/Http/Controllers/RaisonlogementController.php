<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaisonlogementController extends Controller
{
    public function index(){
        $raison = DB::table('EL_RAISONLOGEMENTDEMANDES')->select('intitule','id')->get();
        return $raison;
    }
}
