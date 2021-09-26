@extends('admin.layouts.admin')
    @section('contenido_header')
        <h1>Eliminar Categoría</h1>
    @endsection

    @section('contenido')
    <div class="card">
        <div class="card-body">
            <div class="col-12 mx-auto p-4">
                Se eliminará la categoría:
                <span class="lead">
                    {{ $categoria->catNombre }}
                </span>
                <form action="{{ route('admin.destroyCategoria') }}" method="post">
                @method('delete')
                @csrf
                    <input type="hidden" name="catNombre"
                        value="{{ $categoria->catNombre }}">
                    <input type="hidden" name="idCategoria"
                        value="{{ $categoria->idCategoria }}">
                    <button class="btn btn-danger btn-block my-3">
                        Confirmar baja
                    </button>
                    <a href="{{ route('admin.listarCategorias') }}" class="btn btn-light btn-block">
                        Volver a panel
                    </a>
                </form>
            </div>
        </div>
    </div>

    @endsection
