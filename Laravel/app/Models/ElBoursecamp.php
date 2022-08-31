<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElBoursecamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'soldeouverture',
        'soldeanneeencours'
    ];
}
