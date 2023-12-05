<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employers extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom','poste','salaire','total_conger','conger_disponible'
    ];
}
