<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElBourseeid extends Model
{
    use HasFactory;
    protected $fillable = [
        'titreannee',
        'seul_identifiant',
    ];
}
