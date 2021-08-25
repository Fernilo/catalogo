@extends('layouts.plantilla')

    @section('contenido')

        <h1>Panel de administración de productos</h1>

        @if ( session('mensaje') )
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Marca</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Presentación</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th colspan="2">
                        <a href="/agregarProducto" class="btn btn-outline-secondary">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->prdNombre }}</td>
                    <td>{{ $producto->getMarca->mkNombre }}</td>
                    <td>{{ $producto->getCategoria->catNombre }}</td>
                    <td>${{ $producto->prdPrecio }}</td>
                    <td>{{ $producto->prdPresentacion }}</td>
                    <td>{{ $producto->prdStock }}</td>
                    <td>
                        <img src="/productos/{{ $producto->prdImagen }}" alt="" class="img-fluid">
                    </td>
                    <td>
                        <a href="/modificarProducto" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="/eliminarProducto" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
        {{ $productos->links() }}

    @endsection
