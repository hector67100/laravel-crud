<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;

class ProductoController extends Controller
{
    //
    public function getAllProductos()
    {
        $products = Producto::all();
        return compact('products');
    }

    public function getProductosPorPedido($id)
    {
        $Pedido = Pedido::with('producto_id')->where('compra_id',$id)->orderBy("compra_id")->get();
        return compact('Pedido');
    }

    public function CrearProducto(Request $request)
    {
        Producto::create($request->all());
        return 'Producto Creado Exitosamente';
    }

    public function destroy($id)
    {
        $product = Producto::findOrFail($id);
        $product->delete();
        return 'Producto Eliminado';
    }

    public function update(Request $request, $id)
    {
        $product = Producto::findOrFail($id);
        $product->update($request->all());
        return 'Producto Actualizado';
    }
}
