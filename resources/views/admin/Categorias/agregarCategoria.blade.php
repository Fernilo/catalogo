@extends('admin.layouts.admin')
    @section('contenido_header')
        <h1>Agregar Categoría</h1>
    @endsection

    @section('contenido')
        <div class="card">
            <div class="card-body">
                <form action="{{ route('comments.store') }}" method="post">
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
                    <a href="admin.listarCategorias" class="btn btn-outline-secondary">
                        Volver a panel
                    </a>
                </form>
            </div>
        </div>
    @endsection