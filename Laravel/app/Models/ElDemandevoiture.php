<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElDemandevoiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'nouveau',
        'typevoiture',
        'montant',
    ];
}
