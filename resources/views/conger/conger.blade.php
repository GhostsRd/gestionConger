@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="m-2 text-muted fw-bold">Conger</h3>
</div>
<div class="container p-2 ">

    <div class=" table-sm bg-white card  w-100 rounded-3  shadow-sm" style="font-size: 0.7rem">
        <table class="card-body  table-sm  text-center" >
           <div class="row">
            <div class="col-lg-2">
                <h5 class="fw-bold text-primary m-2" style="font-size: 1rem">Liste de conger</h5>
            </div>
            <div class="col-lg-5 offset-lg-3">
                <form action="{{url('/pointage/find/')}}" method="POST">
                    @csrf
                    <input type="date" name="recherche" class=" form-control-plaintext rounded-3 shadow-sm">
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
                <th  class="border-0 ">Employer </th>
                <th  class="border-0 ">Motif </th>
                <th  class="border-0 ">Nombre du jour </th>
                <th  class="border-0 ">Date debut </th>
  
                <th class="border-0 ">Date retour</th>
                <th  class="border-0 " colspan="2">Action</th>

                
            </thead>
            <tbody>
                @foreach ($congers as $con )    
                    <tr>
                        <td  class="border-0 bg-white">
                            @foreach ($employers as $employer)
                            @if($con->num_employer == $employer->id)
                            {{$employer->nom}} {{$employer->prenom}}
                            @endif
                            @endforeach
                            
                        </td>
                        <td  class="border-0 bg-white">{{$con->motif}}</td>

                        <td  class="border-0 bg-white">{{$con->nb_jour}}</td>
                        <td  class="border-0 bg-white">{{
                            $con->date_debut
                        
                        }}</td>
                        <td  class="border-0 bg-white">{{
                            $con->date_retour
                        
                        }}</td>
                 
                       
                        <td  class="border-0 bg-white">
                            <a href="{{url('/conger/delete',$con->id)}}" class="nav-link text-primary">delete</a>    
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
          <h5 class="modal-title fw-bold" id="exampleModalLongTitle">Ajouter conger</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
                <form action="{{url('/conger/ajout')}}" method="POST">
                    @CSRF
                    <div class="modal-body col-lg-8 offset-lg-2">
                        <label for="" class="m-1 fw-bold">Employer</label>
                      <select name="num_employer" id="" required class="form-control-plaintext shadow-sm pl-2 rounded-3 form-control">
                          @foreach ($employers as $employer)
                        <option value="{{$employer->id}}">{{$employer->nom}} {{$employer->prenom}}</option>
                        @endforeach
                      </select>
            
                      <label for="" class="m-1 fw-bold">motif</label>
                      <input type="text" name="motif" class=" form-control-plaintext rounded-3 shadow-sm pl-2 form-sm"
                      placeholder="motif du conger"  id="">

                      <label for="" class="m-1 fw-bold">Nombre du jour</label>
                      <input type="number" name="nb_jour" class=" form-control-plaintext rounded-3 shadow-sm pl-2 form-sm" 
                      placeholder="Nombre du jour" id="">
                      
                      <label for="" class="m-1 fw-bold">Date debut</label>
                      <input type="date" name="date_debut" class=" form-control-plaintext rounded-3 shadow-sm pl-2 form-sm" 
                      placeholder="date debut"
                      id="">
                     
                    
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
<div id="notification" class="rounded-5 p-2 active shadow text-white ">
 <a href="" class="nav-link">
  {{session('notif')}} <span class="text-danger fw-bold"> :) </span>
 
 </a>
</div>
@endif
@endsection
