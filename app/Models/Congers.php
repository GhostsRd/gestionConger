<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Congers extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_employer', 'motif','nb_jour','date_debut','date_retour'
    ];
}
