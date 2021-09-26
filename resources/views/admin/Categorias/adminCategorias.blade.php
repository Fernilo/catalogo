@extends('admin.layouts.admin')
    @section('contenido_header')
        <h1>Listado de Categorías</h1>
    @endsection

    @section('contenido')
    <div class="card">
        <div class="card-body">
            @if ( session('mensaje') )
                <div class="alert font-weight-bold alert-{{ session('color')? 'danger' : 'success'}}">
                    {{ session('mensaje') }}
                </div>
            @endif
        
            <table class="table table-borderless table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Categoría</th>
                        <th colspan="2">
                            <a href="{{ route('admin.agregarCategoria') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-plus"></i> Agregar
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach( $categorias as $categoria )
                    <tr>
                        <td>{{ $categoria->idCategoria }}</td>
                        <td>{{ $categoria->catNombre }}</td>
                        <td>
                            <a href="{{ route('admin.editCategoria', ['id' => $categoria->idCategoria ]) }}" class="btn btn-outline-secondary">
                                <i class="fas fa-edit"></i> Modificar
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.confirmarBaja', ['id' => $categoria->idCategoria ]) }}" class="btn btn-outline-secondary">
                                <i class="fas fa-trash"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        
            <div class="mt-4 d-flex justify-content-center">
                {{ $categorias->links() }}
            </div>
        </div>
    </div>
    @endsection