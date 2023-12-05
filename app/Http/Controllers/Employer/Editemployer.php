<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employers;
use Illuminate\Http\Request;

class Editemployer extends Controller
{
    //

    public function index($id){
        return view('employer.editemployer',[
            
            "employers" => Employers::where('id',$id)
            ->get(),
            "alls"=> Employers::all(),
        ] );
    }
}
