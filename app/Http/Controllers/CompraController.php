<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Pedido;
class CompraController extends Controller
{
    //
    public function getAllCompras()
    {
        $compra = Compra::with('user_id:name,id,email')->get();
        return compact('compra');
    }

    public function CrearCompra(Request $request)
    {
        
        $compra = Compra::create($request["compra"]);
        foreach($request["producto"]["productos"] as $productos)
        {
            $pedido = new Pedido;
            $pedido->compra_id = $compra["id"];
            $pedido->cantidad = 1;
            $pedido->producto_id = $productos;
            $pedido->save();
        }
        return 'Compra Creado Exitosamente';
    }

    
    public function usuariosConCompras(Request $request)
    {
        $compra = Compra::with('user_id:name,id,email')->distinct('user_id')->get();
        return compact('compra');
    }

    public function productosCompradosPorUsuario($id)
    {
        $compra = Compra::with('user_id:name,email','id','id.producto_id')->distinct('id.producto_id')->get();
        return compact('compra');
    }
}
