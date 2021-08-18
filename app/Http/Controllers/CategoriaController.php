<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(5);
        
        return view('adminCategorias' , ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agregarCategoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catNombre = $request->catNombre;
        
        $this->validarForm($request);

        $categoria = new Categoria; 
        $categoria->catNombre = $catNombre;

        $categoria->save();

        return redirect('/adminCategorias')
                    ->with(['mensaje' => 'Categoría: ' .$catNombre. ' agregada correctamente']);
    }

    private function validarForm(Request $request)
    {
        $request->validate(
            ['catNombre' => 'required|min:2|max:50'],
            [
                'catNombre.required' => 'El campo nombre de categoría es obligatorio',
                'catNombre.min' => 'El campo debe tener un mínimo de 2 caractéres',
                'catNombre.max' => 'El campo debe tener un máximo de 50 caracterés'
            ]
        );
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
