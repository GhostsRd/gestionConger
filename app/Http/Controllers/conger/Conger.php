<?php

namespace App\Http\Controllers\conger;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Employer\Employer;
use App\Models\Congers;
use App\Models\Employers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Conger extends Controller
{
    public function remove($id){

        Congers::where('id',$id)->delete();
        return redirect('/conger')->with('notif',"Effacé avec success");

    }
    public function ajout(Request $request){
        $date_fianle = date('Y-m-d', strtotime($request->date_debut) + ($request->nb_jour * 24 * 60 * 60));

        $count = DB::select("select sum(nb_jour) as res  from congers where num_employer = '".$request->num_employer."'");
        
        foreach($count as $cn){
            $resultat = $cn->res;
            // dd($resultat);
        }
        $total = $resultat + $request->nb_jour;
        if($total>30){
            return redirect('/conger')->with('notif',"Vous ne pouvez plus ajouté un conger à cette personne");

        }else{
            Employers::where('id',$request->num_employer)->update([
                "total_conger"=>$total,
                "conger_disponible"=>30-$total,
            ]);
            Congers::create([
                'num_employer'=> $request->num_employer,
                'motif'=> $request->motif,
                'nb_jour'=> $request->nb_jour,
                'date_debut'=> $request->date_debut,
                'date_retour'=> $date_fianle,
            ]);
            return redirect('/conger')->with('notif',"Ajout avec succéss");
        }



    }
    public function index(){

    
        
        return view('conger.conger',
        [
            'congers'=>Congers::all(),

            'employers'=>Employers::all(),
        ]
    );
    }
}
