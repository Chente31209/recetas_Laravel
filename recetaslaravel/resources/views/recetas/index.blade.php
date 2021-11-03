@extends('layouts.app')

@section('botones')
<a href="{{route('recetas.create')}}" class="btn btn-primary mr-2">Crear Recetas</a>
@endsection
@section('content')
<h2 class="text-center mb-5">Administra tus recetas</h2>
<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
    <thead class="bg-primary text-light">
        <th scole="col">Titulo</th>
        <th scole="col">Categoria</th>
        <th scole="col">Acciones</th> 

    </thead>
    <tbody>
        <td>Piza de Peroni</td>
        <td>PIzas</td>
        <td></td>

    </tbody>
    </table>
</div>




@endsection