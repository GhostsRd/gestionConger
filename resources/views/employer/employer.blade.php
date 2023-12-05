@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="m-2 text-muted fw-bold">Employer</h3>
</div>
<div class="container p-2 ">

    <div class=" table-sm bg-white card  w-100 rounded-3  shadow-sm" style="font-size: 0.7rem">
        <table class="card-body  table-sm  text-center" >
           <div class="row">
            <div class="col-lg-2">
                <h5 class="fw-bold text-primary m-2" style="font-size: 1rem">Liste d'employer</h5>
            </div>
            <div class="col-lg-5 offset-lg-3">
                <form action="{{url('employer/find/')}}" method="POST">
                    @csrf
                <input type="text" name="recherche" class=" form-control-plaintext shadow-sm rounded-3 m-2 pl-2 w-100"
                 placeholder="Recherche" id="">
            </div>
            <div class="col-lg-1">
                <button class="btn btn-sm btn-danger rounded-5 shadow-sm m-2 border-0">recheche  </button>
            </div>
                 </form>
            <div class="col-lg-1">
                <button class="btn btn-sm btn-secondary rounded-5 shadow-sm m-2 border-0" data-toggle="modal" data-target="#ajouter">nouveau  </button>
            </div>
            
           </div>

            <thead>
                <th class="border-0 ">Nom</th>
                <th  class="border-0 ">Prenom </th>
                <th  class="border-0 ">Poste</th>
                <th  class="border-0 ">Salaire</th>
                <th  class="border-0 ">Total conger</th>
                <th  class="border-0 ">Conger disponible</th>
                <th  class="border-0 " colspan="3">Action</th>

                
            </thead>
            <tbody>
                @foreach ($employers as $employer )    
                    <tr>
                        <td  class="border-0 bg-white">{{$employer->nom}}</td>
                        <td  class="border-0 bg-white">{{$employer->prenom}}</td>
                        <td  class="border-0 bg-white">{{$employer->poste}}</td>
                        <td  class="border-0 bg-white">{{$employer->salaire}} </td>
                        <td  class="border-0 bg-white">{{$employer->total_conger}} </td>
                        <td  class="border-0 bg-white">{{$employer->conger_disponible}} </td>

                        <td  class="border-0 bg-white">
                            <a href="{{url('/employer/edit',$employer->id)}}" class="nav-link text-primary">edit</a>    
                        </td>
                        <td  class="border-0 bg-white">
                            <a href="{{url('/employer/delete',$employer->id)}}" class="nav-link text-primary">delete</a>    
                        </td>
                        <td  class="border-0 bg-white">
                            <a href="{{url('/fiche',$employer->id)}}" class="nav-link text-primary">fiche</a>    
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
<div class="container">

</div>


  <!-- Modal -->
  <div class="modal fade" id="ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="exampleModalLongTitle">Ajouter un employer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
                <form action="{{url('/employer/ajout')}}" method="POST">
                    @CSRF
                    <div class="modal-body col-lg-8 offset-lg-2">
                        <label for="" class="m-1 fw-bold">Nom</label>
                      <input type="text" name="nom" id="" class="border-0 shadow-sm p-2 rounded-3 form-control-plaintext" 
                      placeholder="Entrer nom" required> <br>
            
                      <label for="" class="m-1 fw-bold">Prenom</label>
                      <input type="text" name="prenom" id="" class="border-0 shadow-sm p-2 rounded-3 form-control-plaintext"
                       placeholder="Entrer prenom" required> <br>
            
                       <label for="" class="m-1 fw-bold">Poste</label>
                      <input type="text" name="poste" id="" class="border-0 shadow-sm p-2 rounded-3 form-control-plaintext"
                       placeholder="Entrer poste" required> <br>
            
                       <label for="" class="m-1 fw-bold">Salaire (AR)</label>
                      <input type="text" name="salaire" id="" class="border-0 shadow-sm p-2 rounded-3 form-control-plaintext"
                       placeholder="Entrer salaire"  minlength="5" aria-valuemin="500000" required> <br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm rounded-3 btn-secondary" data-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-sm rounded-3 btn-primary">Enregistrer</button>
                    </div>
                </form>
      </div>
    </div>
  </div>
@if (session('notif'))
<div id="notification" class="rounded-5 active shadow text-white ">
 <a href="" class="nav-link">
  {{session('notif')}} <span class="text-danger fw-bold"> :) </span>
 
 </a>
</div>
@endif
@endsection
