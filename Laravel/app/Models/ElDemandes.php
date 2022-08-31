<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElDemandes extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_form',
        'id_doc',
        'user_id',
        'DateDemande',
        'EtapeEncours',
        'EtapeSuivante',
        'Status'
    ];
}
