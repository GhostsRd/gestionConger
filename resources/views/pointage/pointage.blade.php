@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="m-2 text-muted fw-bold">Pointage</h3>
</div>
<div class="container p-2 ">

    <div class=" table-sm bg-white card  w-100 rounded-3  shadow-sm" style="font-size: 0.7rem">
        <table class="card-body  table-sm  text-center" >
           <div class="row">
            <div class="col-lg-2">
                <h5 class="fw-bold text-primary m-2" style="font-size: 1rem">Liste de pointage</h5>
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
                <th  class="border-0 ">Pointage</th>
                <th class="border-0 ">Date de Pointage</th>
                <th  class="border-0 " colspan="2">Action</th>

                
            </thead>
            <tbody>
                @foreach ($pointages as $point )    
                    <tr>
                        <td  class="border-0 bg-white">
                            @foreach ($employers as $employer)
                            @if($point->num_employer == $employer->id)
                            {{$employer->nom}} {{$employer->prenom}}
                            @endif
                            @endforeach
                            
                        </td>
                        <td  class="border-0 bg-white">{{$point->pointage}}</td>
                        <td  class="border-0 bg-white">{{
                     $point->date_pointage
                        
                        }}</td>
                 
                       
                        <td  class="border-0 bg-white">
                            <a href="{{url('/employer/delete',$point->id)}}" class="nav-link text-primary">delete</a>    
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
          <h5 class="modal-title fw-bold" id="exampleModalLongTitle">Ajouter pointage</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
                <form action="{{url('/pointage/ajout')}}" method="POST">
                    @CSRF
                    <div class="modal-body col-lg-8 offset-lg-2">
                        <label for="" class="m-1 fw-bold">Date pointage</label>
                      <input type="date" name="date_pointage" id="" class="border-0 shadow-sm p-2 rounded-3 form-control-plaintext" 
                      placeholder="Date pointage" required> <br>
            
                      <label for="" class="m-1 fw-bold">Employer</label>
                      <select name="num_employer" id="" required class="form-control rounded-3">
                          @foreach ($employers as $employer)
                        <option value="{{$employer->id}}">{{$employer->nom}} {{$employer->prenom}}</option>
                        @endforeach
                      </select>
            
                       <label for="" class="m-1 fw-bold">Pointage</label>
                      <select name="pointage" id="" required class="form-control rounded-3">
                        <option value="oui">Oui</option>
                        <option value="non">Non</option>
                      </select>
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
