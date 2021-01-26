<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\Unidad;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;
use Exception;
class ProductoController extends Controller
{
     const PAGINATION = '4';

    
    public function index(Request $request )
    {
        error_log('Se accedió al metodo INDEX');
        $producto = DB::table('productos as p')->join('categorias as c','c.codcategoria','p.codcategoria')
        ->join('unidades as u','u.codunidad','=','p.codunidad')->where('p.estado','=','1')
        ->select('p.codproducto','p.descripcion','p.codcategoria','c.descripcion as categoria',
            'p.codunidad','u.descripcion as unidad','p.precio','p.stock')->get();
        ;

        return response()->json($producto);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
     

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        error_log('Se accedió al metodo STORE');
       try {
            $producto = new Producto();
            $producto->descripcion = $request->descripcion;
            $producto->codcategoria = $request->codcategoria;
            $producto->codunidad = $request->codunidad;
            $producto->precio = $request->precio;
            $producto->stock = $request->stock;
            $producto->estado='1';
            $producto->save();
            
            $result = ['descripcion'=>$producto->descripcion,'created'=>true];
            return $result;

       } catch (Exception $e) {
           return "ERROR en store : ".$e->getMessage();
        
        
        //throw $th;
       }
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        error_log('Se accedió al metodo SHOW');
        return Producto::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $codproducto)
    {

        error_log('Se accedió al metodo UPDATE');
            $producto = Producto::findOrFail($codproducto);
           $producto->Update($request->all());
            return $producto;
    }





    public function destroy($codproducto)
    {
        error_log('Se accedió al metodo DESTROY');
        $producto=Producto::findOrFail($codproducto);
        $producto->delete();
        return 204;
    }
}
