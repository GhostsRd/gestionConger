<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employers;
use Illuminate\Http\Request;

class Employer extends Controller
{
    // public $employers = [];
    public function index(){

        // dd($this->employers);
        return view('employer.employer',[
            
            "employers" => Employers::all(),
        ]        
    );
    }
    public function remove($id){
        Employers::where('id',$id)->delete();
        return redirect('/employer')->with('notif',"suppression avec succéss");
    }
    public function recherche(Request $request){
        if($request->recherche == ""){
            return redirect('/employer');
        }
        return view('employer.employer',[

            "employers" => Employers::where('nom','like','%'.$request->recherche.'%')
            ->orWhere('prenom','like','%'.$request->recherche.'%')
            ->orWhere('poste','like','%'.$request->recherche.'%')
            ->get(),
            
        ]);
    }
    public function ajout(Request $request){
        
        Employers::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'poste'=>$request->poste,
            'salaire'=>$request->salaire,

        ]);
        return redirect('/employer')->with('notif',"Ajout avec succéss");

    }
    public function modifier(Request $request){
        
        Employers::where('id',$request->id)->update([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'poste'=>$request->poste,
            'salaire'=>$request->salaire,

        ]);
        return redirect('/employer')->with('notif',"Modification terminé avec succéss");

    }

}
