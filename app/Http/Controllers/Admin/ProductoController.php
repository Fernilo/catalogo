<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(5);
        return view('admin.Productos.adminProductos', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('admin.Productos.agregarProductos', ['marcas' => $marcas , 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validamos
        $this->validarForm($request);

        //subir imagen *
        $prdImagen = $this->subirImagen($request);
        //instanciamos, asignamos
        $Producto = new Producto();
        $Producto->prdNombre = $request->prdNombre;
        $Producto->prdPrecio = $request->prdPrecio;
        $Producto->idMarca = $request->idMarca;
        $Producto->idCategoria = $request->idCategoria;
        $Producto->prdPresentacion = $request->prdPresentacion;
        $Producto->prdStock = $request->prdStock;
        $Producto->prdImagen = $prdImagen;
        //guardamos
        $Producto->save();

        return redirect()
            ->route('admin.listarProductos')
            ->with( [ 'mensaje'=>'Producto: '.$request->prdNombre.' agregado correctamente.' ] );
    }

    private function validarForm(Request $request)
    {
        $request->validate(
            [
                'prdNombre'=>'required|min:2|max:30',
                'prdPrecio'=>'required|numeric|min:0',
                'idMarca'=>'required',
                'idCategoria'=>'required',
                'prdPresentacion'=>'required|min:3|max:150',
                'prdStock'=>'required|integer|min:1',
                'prdImagen'=>'mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
            ],
            [
                'prdNombre.required'=>'El campo "Nombre del producto" es obligatorio.',
                'prdNombre.min'=>'El campo "Nombre del producto" debe tener como m??nimo 2 caract??res.',
                'prdNombre.max'=>'El campo "Nombre" debe tener 30 caract??res como m??ximo.',
                'prdPrecio.required'=>'Complete el campo Precio.',
                'prdPrecio.numeric'=>'Complete el campo Precio con un n??mero.',
                'prdPrecio.min'=>'Complete el campo Precio con un n??mero positivo.',
                'idMarca.required'=>'Seleccione una marca.',
                'idCategoria.required'=>'Seleccione una categor??a.',
                'prdPresentacion.required'=>'Complete el campo Presentaci??n.',
                'prdPresentacion.min'=>'Complete el campo Presentaci??n con al menos 3 caract??res',
                'prdPresentacion.max'=>'Complete el campo Presentaci??n con 150 caract??res como m??xino.',
                'prdStock.required'=>'Complete el campo Stock.',
                'prdStock.integer'=>'Complete el campo Stock con un n??mero entero.',
                'prdStock.min'=>'Complete el campo Stock con un n??mero positivo.',
                'prdImagen.mimes'=>'Debe cargar una imagen.',
                'prdImagen.max'=>'Debe ser una imagen de 2MB como m??ximo.'
            ]
        );
    }

    private function subirImagen(Request $request)
    {
        //si no enviaron imagen store()
        $prdImagen = 'noDisponible.jpg';

        //si no enviaron imagen update()
        if( $request->has('imgActual') ){
            $prdImagen = $request->imgActual;
        }
        //si enviaron imagen Subir Archivo
        if( $request->file('prdImagen') ){
            //renombrar archivo
                //time() . extension
            $extension = $request->file('prdImagen')->extension();
            $prdImagen = time().'.'.$extension;
            //subir
            $request->file('prdImagen')
                        ->move( public_path('productos/'), $prdImagen );
        }

        return $prdImagen;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        $marcas = Marca::all();

        $categorias = Categoria::all();

        return view('admin.Productos.editarProductos', ['producto' => $producto,'marcas' => $marcas , 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validaci??n
        $this->validarForm($request);
        //subir imagen *
        $prdImagen = $this->subirImagen($request);
        //obtenemos Producto por su id
        $Producto = Producto::find( $request->idProducto );
        //asignamos
        $Producto->prdNombre = $request->prdNombre;
        $Producto->prdPrecio = $request->prdPrecio;
        $Producto->idMarca = $request->idMarca;
        $Producto->idCategoria = $request->idCategoria;
        $Producto->prdPresentacion = $request->prdPresentacion;
        $Producto->prdStock = $request->prdStock;
        $Producto->prdImagen = $prdImagen;
        //guardamos
        $Producto->save();
        //redirecci??n + mensaje ok
        return redirect()
            ->route('admin.listarProductos')
            ->with( [ 'mensaje'=>'Producto: '.$request->prdNombre.' modificado correctamente.' ] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
