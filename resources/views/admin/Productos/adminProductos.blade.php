@extends('admin.layouts.admin')
    @section('contenido_header')
        <h1>Listado de Productos</h1>
    @endsection

    @section('contenido')
    <div class="card">
        <div class="card-body">
            @if ( session('mensaje') )
                <div class="alert alert-success">
                    {{ session('mensaje') }}
                </div>
            @endif
    
            <table class="table table-borderless table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Producto</th>
                        <th>Marca</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Presentación</th>
                        <th>Stock</th>
                        <th>Imagen</th>
                        <th colspan="2">
                            <a href="{{ route('admin.agregarProductos') }}" class="btn btn-outline-secondary">
                                Agregar
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->idProducto }}</td>
                        <td>{{ $producto->prdNombre }}</td>
                        <td>{{ $producto->getMarca->mkNombre }}</td>
                        <td>{{ $producto->getCategoria->catNombre }}</td>
                        <td>${{ $producto->prdPrecio }}</td>
                        <td>{{ $producto->prdPresentacion }}</td>
                        <td>{{ $producto->prdStock }}</td>
                        <td>
                            <img src="/productos/{{ $producto->prdImagen }}" alt="" class="img-fluid" width="80">
                        </td>
                        <td>
                            <a href="/modificarProducto/{{ $producto->idProducto }}" class="btn btn-outline-secondary">
                                Modificar
                            </a>
                        </td>
                        <td>
                            <a href="/eliminarProducto/{{ $producto->idProducto }}" class="btn btn-outline-secondary">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                    @endforeach
    
    
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-center">
                {{ $productos->links() }}
            </div>
        </div>
    </div>
    @endsection