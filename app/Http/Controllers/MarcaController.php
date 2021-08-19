<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtener listado de marcas
        $marcas = Marca::paginate(7);
        //retornar vista con datos
        return view('adminMarcas', [ 'marcas'=>$marcas ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregarMarca');
    }

    private function validarForm(Request $request)
    {
        $request->validate(
            [ 'mkNombre'=>'required|min:2|max:50' ],
            [
                'mkNombre.required'=>'El campo "Nombre de la marca" es obligatorio.',
                'mkNombre.min'=>'El campo "Nombre de la marca" debe tener como mínimo 2 caractéres.',
                'mkNombre.max'=>'El campo "Nombre de la marca" debe tener 50 caractéres como máximo.',
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //capturamos dato
        $mkNombre = $request->mkNombre;
        //validación
        $this->validarForm($request);
        //instanciación, asignación, guardar datos
        $Marca = new Marca;
        $Marca->mkNombre = $mkNombre;
        $Marca->save();
        //redireccion con mensaje ok
        return redirect('/adminMarcas')
            ->with( [ 'mensaje'=>'Marca: '.$mkNombre.' agregada correctamente' ] );
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
        //obtenemos datos de una marca
        $Marca = Marca::find($id);
        //retornamos vista con los datos
        return view('modificarMarca', [ 'Marca' => $Marca ]);
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
        $mkNombre = $request->mkNombre;
        //validación
        $this->validarForm($request);
        //obtenemos datos de una marca
        $Marca = Marca::find($request->idMarca);
        //asignación y gardar
        $Marca->mkNombre = $mkNombre;
        $Marca->save();
        //redirección con mensaje ok
        return redirect('/adminMarcas')
            ->with( [ 'mensaje'=>'Marca: '.$mkNombre.' modificada correctamente' ] );
    }

    public function confirmarBaja($id) 
    {
        $Marca = Marca::find($id);

        //Si no tiene productos asignados
        if($this->productoMarca($id)){
            return view('eliminarMarca' , ['Marca' => $Marca]);
        }

        return redirect('adminMarcas')->with(['mensaje' => 'No se puede eliminar']);
    }

    public function productoMarca($idMarca)
    {
        //$check = Producto::where('idMarca' , $idMarca)->first();

        //dd($check);exit;
        $check = Producto::where('idMarca', $idMarca)->count();
        return $check;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Marca::destroy($request->idMarca);

        return redirect('/adminMarcas')
            ->with( [ 'mensaje'=>'Marca: '.$request->mkNombre.' eliminada correctamente' ] );
    }
}
