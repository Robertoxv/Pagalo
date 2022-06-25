<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\proveedores;

class proveedoresController extends Controller
{
    //
    public function crearproveedores(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'Nombre_proveedor'     => 'required',
            'Correo'               => 'required',
            'Direccion'            => 'required',
            'Telefono'             => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['Mensaje'=>$validator->messages()->first()],400);
        }

        $proveedores = proveedores::create ([
            'Nombre_proveedor'=>$request->Nombre_proveedor, 
            'Correo'=>$request->Correo,
            'Direccion'=>$request->Direccion,
            'Telefono'=>$request->Telefono
        ]);

        return response()->json(['Mensaje'=>'Proveedor creado', 'data'=>$proveedores],200);

    }

    public function eliminarproveedores(Request $request){
        $validator = Validator::make($request->all(), [
            'id_Proveedor'   => 'required'
        
        ]);
        if ($validator->fails()) {
            return redirect('post/create')->withErros($validator)->withInput();
        }
        $proveedores=proveedores::where('id', $request->id_Proveedor)->delete();
        return response()->json(['Mensaje'=>'Articulo creado'],200);
    }

    public function editarproveedores(Request $request){
        $validar = Validator::make($request->all(), [
            'Nombre_proveedor'     => 'required',
            'Correo'               => 'required',
            'Direccion'            => 'required',
            'Telefono'             => 'required',
            'id_Proveedor'         => 'required'
        ]);
        if ($validar->fails()) {
            return response()->json(['Mensaje'=>$validar->messages()->first()],400);
        }
        $proveedores=proveedores::where('id', $request->id_Proveedor)->first();
        $proveedores->fill([
            'Nombre_proveedor'=>$request->Nombre_proveedor, 
            'Correo'=>$request->Correo,
            'Direccion'=>$request->Direccion,
            'Telefono'=>$request->Telefono,
            'id_Proveedor'=>$request->id_Proveedor
        ]);
        $proveedores->save();
        return response()->json(['Mensaje'=>'Articulo creado', 'data'=>$proveedores],200);
    }

}
