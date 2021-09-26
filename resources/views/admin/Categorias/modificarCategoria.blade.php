@extends('admin.layouts.admin')
    @section('contenido_header')
        <h1>Modificación de una categoría</h1>
    @endsection

    @section('contenido')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.updateCategoria') }}" method="post">
            @method('put')
            @csrf
                <div class="form-group">
                    <label for="catNombre">Nombre de la categoría</label>
                    <input type="text" name="catNombre"
                        class="form-control @error('catNombre') is-invalid @enderror" placeholder="Ingrese el nombre de la categoría" value="{{ $categoria->catNombre }}" id="catNombre" value="{{old('catNombre')}}"> 
                        <input type="hidden" name="idCategoria"
                            value="{{ $categoria->idCategoria }}">
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
                <button class="btn btn-dark mr-3">Modificar categoría</button>
                <a href="{{ route('admin.listarCategorias') }}" class="btn btn-outline-secondary">
                    Volver a panel
                </a>
            </form>
           
    
            {{-- @if( $errors->any() )
                <div class="alert alert-danger col-8 mx-auto">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif --}}
        </div>
    </div>
    @endsection