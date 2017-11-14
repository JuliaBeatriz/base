<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//hacemos referencia al modelo Categoria
use App\Categoria;
//hacemos referencia a la clase para manejo de datos
use DB;

use App\Http\Requests\CategoriaFormRequest;

use Illuminate\Support\Facades\Redirect;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) 
        {

            //obtengo del formulario al valor que fue escrito con el componente search
            $valor=trim($request->get('searchText'));

        //
        //cargamos los datos de la tabla 
        $categoria= DB::table('categoria')
        ->where('nombre','LIKE',"%$valor%")
        ->where('condicion','=','1')
        ->orderby('idcategoria','desc')
        ->paginate(5);

        return view('almacen.categoria.index')
        ->with("categorias",$categoria);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //muestra el formulario de captura
        return view('almacen.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaFormRequest $request)
    {
        //

         $categoria = new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='1';
        $categoria->save();

        return Redirect::to('almacen\categoria');
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
        //buscar en la tabla categoria un registro cuya id sea la que recibe el controlador 
        $categoria=Categoria::findOrFail($id);

        return view('almacen.categoria.edit')
        ->with("categoria",$categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaFormRequest $request, $id)
    {
        //
        $categoria=categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();

       return Redirect::to('almacen/categoria');
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
        $categoria=Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();

        return Redirect::to('almacen/categoria');
    }
}
