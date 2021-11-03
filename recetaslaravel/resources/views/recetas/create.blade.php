@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('botones')
<a href="{{route('recetas.index')}}" class="btn btn-primary mr-2">Ver Mis Resetas</a>

@endsection
@section('content')
<h1>Crar recetas </h1>

<div class="row justify-content mt-5">

    <div class="col-md-8" >
        <form action="{{route('recetas.store')}}" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            <div class="form-grup mt-3">
                <label for="titulo">Titulo Reseta</label>
                <input type="text"
                    name="titulo"
                    class="form-control"
                    id="titulo"
                    placeholder="Titulo De La Reseta"
                    value="{{old('titulo')}}">
                @error ('titulo')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-grup mt-3">
                <label for="categoria">Categorias</label>
                <select
                    name="categoria"
                    class="form-control"
                    id="categoria"
                >
                <option value="">-- selecione --</option>
                    @foreach($categorias as $id => $categoria)
                        <option value="{{$id}}">{{$categoria}}</option>
                    @endforeach
                </select>
                @error ('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-grup mt-3">
                <label for="preparacion">Preparacion</label>
                <input type="hidden" name="preparacion" id="preparacion" class="form-control" value="{{old('preparacion')}}">
                <trix-editor input="preparacion"></trix-editor>
                @error ('preparacion')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-grup mt-3">
                <label for="Ingredientes">Ingredientes</label>
                <input type="hidden" name="Ingredientes" id="Ingredientes" class="form-control" value="{{old('Ingredientes')}}">
                <trix-editor input="Ingredientes"></trix-editor>
                @error ('Ingredientes')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-grup mt-3">
                <label for="Ingredientes">Ingresa  Tu imagen </label>
                <input 
                    type="file" 
                    name="imagen" 
                    id="imagen"
                    class="form-control">
                    @error ('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
<br>
            <div class="form-grup">
                <input type="submit" value="Agergar Reseta" class="btn btn-primary">
            </div>
            

        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection