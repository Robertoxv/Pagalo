<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\articulos;

class articuloProveedorcontroller extends Controller
{
    //
    public function creararticulo(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'Nombre_Articulo'   => 'required', 
            'Precio'            => 'required', 
            'Pais_origen'       => 'required',
            'id_proveedores'    => 'required',
            'Observaciones'     => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['Mensaje'=>$validator->messages()->first()],400);
        }

        $articulo = articulos::create ([
            'Nombre_Articulo'=>$request->Nombre_Articulo, 
            'Precio'=>$request->Precio,
            'Pais_origen'=>$request->Pais_origen,
            'id_proveedores'=>$request->id_proveedores,
            'Observaciones'=>$request->Observaciones
        ]);

        
        return response()->json(['Mensaje'=>'Articulo creado', 'data'=>$articulo],200);
    }

    public function eliminararticulo(Request $request){
        $validator = Validator::make($request->all(), [
            'id_producto'   => 'required'
        
        ]);
        if ($validator->fails()) {
            return redirect('post/create')->withErros($validator)->withInput();
        }
        $articulo=articulos::where('id', $request->id_producto)->delete();
        return response()->json(['Mensaje'=>'Articulo creado'],200);
    }

    public function editararticulo(Request $request){
        $validar = Validator::make($request->all(), [
            'id_producto'       => 'required',
            'Nombre_Articulo'   => 'required',
            'Precio'            => 'required',
            'Pais_origen'       => 'required'
        ]);
        if ($validar->fails()) {
            return response()->json(['Mensaje'=>$validar->messages()->first()],400);
        }
        $articulo=articulos::where('id', $request->id_producto)->first();
        $articulo->fill([
            'Nombre_Articulo'=>$request->Nombre_Articulo, 
            'Precio'=>$request->Precio,
            'Pais_origen'=>$request->Pais_origen,
            'id_proveedores'=>$request->id_proveedores,
            'Observaciones'=>$request->Observaciones
        ]);
        $articulo->save();
        return response()->json(['Mensaje'=>'Articulo creado', 'data'=>$articulo],200);
    }
}
