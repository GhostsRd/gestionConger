<?php

namespace App\Http\Controllers\Pointage;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employer\Employer;
use App\Models\Employers;
use App\Models\Pointages;

use Illuminate\Http\Request;

class Pointage extends Controller
{
    public  $salaire;
    public function index(){

        // dd($this->employers);
        return view('pointage.pointage',[
            "pointages" => Pointages::all(),
            "employers" => Employers::all(),
        ]        
    );
    }
    public function recherche(Request $request){
        if($request->recherche == ""){
            return redirect('/pointage');
        }
        return view('pointage.pointage',[

            "pointages" => Pointages::where('date_pointage','like','%'.$request->recherche.'%')
            ->get(),
            "employers" => Employers::all(),
            
        ]);
    }
    public function ajout(Request $request){

        if($request->pointage == "non"){
           $employers =  Employers::where('id',$request->num_employer)->get();
            foreach($employers as $emp){
                $this->salaire = $emp->salaire;
            }
            $result = $this->salaire - 10000;

            Employers::where('id',$request->num_employer)->update([
                'salaire' => $result,
            ]);

            Pointages::create([
                'date_pointage'=>$request->date_pointage,
                'num_employer'=>$request->num_employer,
                'pointage'=>$request->pointage,
    
            ]);
        }else{
            
            Pointages::create([
                'date_pointage'=>$request->date_pointage,
                'num_employer'=>$request->num_employer,
                'pointage'=>$request->pointage,
    
            ]);
        }
        
        return redirect('/pointage')->with('notif',"Ajout avec succéss");

    }
    
}
