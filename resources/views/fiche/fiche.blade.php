@extends('layouts.app')

@section('content')

<button class="btn btn-sm offset-lg-11 btn-primary rounded-3 shadow-sm">
    <a class="nav-link" href="javascript:window.print()">imprimer</a>
</button>
@foreach ($employers as $emp)
<div class="container mt-2 bg-white p-2 fw-bold rounded-3 shadow-sm">
    <h3>Fiche de paye</h3><hr class="col-lg-3 col-3">
          <div class="offset-lg-1">
            <label for="">Date</label> : {{$date = date("Y-m-h")}}<br>
            <label for="">Nom</label> : {{$emp->nom}}<br>
            <label for="">Nom</label> : {{$emp->prenom}}<br>
    
            <label for="">Poste</label> : {{$emp->poste}} <br>
            <label for="">Nombre d'abscence</label> :
                {{-- @foreach ($pointages as $point)
                    {{$point->id}}
                @endforeach --}}
                {{$pointages}}
            <br>
            <label for="">Montant </label> : {{$emp->salaire}}
          </div>
    </div>
       @endforeach
@endsection
