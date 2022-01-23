@extends('admin.layouts.admin')
    @section('contenido_header')
        <h1>Eliminar Producto</h1>
    @endsection

    @section('contenido')
    <div class="card">
        <div class="card-body">
            <div class="col-12 mx-auto p-4">
                Se eliminará el producto:
                <span class="lead">
                    {{ $producto->prdNombre }}
                </span>
                <form action="{{ route('admin.destroyProducto') }}" method="post">
                @method('delete')
                @csrf
                    <input type="hidden" name="prdNombre"
                        value="{{ $producto->prdNombre }}">
                    <input type="hidden" name="idProducto"
                        value="{{ $producto->idProducto }}">
                    <button class="btn btn-danger btn-block my-3">
                        Confirmar baja
                    </button>
                    <a href="{{ route('admin.listarProductos') }}" class="btn btn-light btn-block">
                        Volver a panel
                    </a>
                </form>
            </div>
        </div>
    </div>

    @endsection
