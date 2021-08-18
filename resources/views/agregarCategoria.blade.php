@extends('layouts.plantilla')

    @section('contenido')

        <h1>Alta de una nueva categoría</h1>

        <div class="alert bg-light border border-white shadow round col-8 mx-auto p-4">

            <form action="/agregarCategoria" method="post">
            @csrf
                <div class="form-group">
                    <label for="catNombre">Nombre de la categoría</label>
                    <input type="text" name="catNombre"
                           class="form-control @error('catNombre') is-invalid @enderror" id="catNombre" value="{{old('catNombre')}}"> 
                           {{-- 
                            En el caso de la edición se puede mostras el dato guardado en bd por defecto en el value agregando un segundo paramétro al old
                            <input type="text" name="catNombre"
                           class="form-control @error('catNombre') is-invalid @enderror" id="catNombre" value="{{old('catNombre',$categoria->nombre)}}">       --}}
                    @error('catNombre')
                        <div class="alert alert-danger mt-2">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-dark mr-3">Agregar categoría</button>
                <a href="/adminMarcas" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </form>
        </div>

        {{-- @if( $errors->any() )
            <div class="alert alert-danger col-8 mx-auto">
                <ul>
                @foreach( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif --}}


    @endsection

