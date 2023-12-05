<?php

namespace App\Http\Controllers\fiche;

use App\Http\Controllers\Controller;
use App\Models\Employers;
use App\Models\Pointages;
use Illuminate\Http\Request;

class Fiche extends Controller
{
    public function fiche($id){
        return view('fiche.fiche',[
            "employers"=>Employers::where('id',$id)->get(),
            "pointages"=>Pointages::where('num_employer',$id)->count('pointage'),
        ]);
    }
    public function index(){
        return view('fiche.fiche',
    [

        "employers"=>Employers::all(),
    ]);
    }
}
