<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElDemandefete extends Model
{
    use HasFactory;

    protected $fillable = [
        'typedemande',
        'raisonfete',
        'montant',
    ];
}
