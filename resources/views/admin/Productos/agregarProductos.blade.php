@extends('admin.layouts.admin')
    @section('contenido_header')
        <h1>Alta de un Producto</h1>
    @endsection

    @section('contenido')
    <div class="card">
        <div class="card-body">
    
            <form action="{{ route('admin.storeProductos') }}" method="post" enctype="multipart/form-data">
            @csrf
                Nombre: <br>
                <input type="text" name="prdNombre"
                        value="{{ old('prdNombre') }}"
                        class="form-control @error('prdNombre') is-invalid @enderror">
                <br>
                Precio: <br>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">$</div>
                    </div>
                    <input type="number" name="prdPrecio"
                            value="{{ old('prdPrecio') }}"
                            class="form-control @error('prdPrecio') is-invalid @enderror" step="0.01" min="0">
                </div>
                <br>
                Marca: <br>
                <select name="idMarca" class="form-control">
                    <option value="">Seleccione una marca</option>
                    @foreach( $marcas as $marca )
                        <option {{ ( old('idMarca') == $marca->idMarca ? 'selected':'') }} value="{{ $marca->idMarca }}">{{ $marca->mkNombre }}</option>
                    @endforeach
                </select>
                <br>
                Categoría: <br>
                <select name="idCategoria" class="form-control">
                    <option value="">Seleccione una Categoría</option>
                    @foreach( $categorias as $categoria )
                        <option {{ ( old('idCategoria') == $categoria->idCategoria ? 'selected':'' ) }} value="{{ $categoria->idCategoria }}">{{ $categoria->catNombre }}</option>
                    @endforeach
                </select>
                <br>
                Presentacion: <br>
                <textarea name="prdPresentacion" class="form-control  @error('prdPresentacion') is-invalid @enderror">{{ old('prdPresentacion') }}</textarea>
                <br>
                Stock: <br>
                <input type="number" name="prdStock"
                        value="{{ old('prdStock') }}"
                        class="form-control  @error('prdStock') is-invalid @enderror" min="0">
                <br>
                Imagen: <br>
                <div class="custom-file mt-1 mb-4">
                    <input type="file" name="prdImagen"  class="custom-file-input" id="customFileLang" lang="es">
                    <label class="custom-file-label" for="customFileLang" data-browse="Buscar en disco">Seleccionar Archivo: </label>
                </div>

                <br>
                <button class="btn btn-dark mb-3">Agregar Producto</button>
                <a href="{{ route('admin.listarProductos') }}" class="btn btn-outline-secondary mb-3">Volver al panel de Productos</a>
            </form>
    
    
            @if( $errors->any() )
                <div class="alert alert-danger col-8 mx-auto">
                    <ul>
                        @foreach( $errors->all() as $error )
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <script>
                let campo = document.querySelector('input[name="prdImagen"]');
                let caja  = document.querySelector('.custom-file-label');
    
                campo.addEventListener('change', cambiarTexto );//Escuchamos el evento
                function cambiarTexto()
                {
                    caja.innerText = trimString(campo.value);//Escribe el texto en el HTML
                }
    
                function trimString(texto) 
                {
                    return texto.substring(12);
                }
            </script>
        </div>
    </div>
    @endsection