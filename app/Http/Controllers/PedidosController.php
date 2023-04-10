<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\producto;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $pedidos = Pedidos::orderBy('id','desc')->get();
        $productos = producto::orderBy('nombreProducto','desc')->get();
        return view('pedidos.index',compact('pedidos'), compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = producto::orderBy('nombreProducto','asc')->get();
        return view('pedidos.create',compact("productos"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $pedido = new Pedidos();
        $pedido->numeroTelefono = $request->numeroTelefono;
        $pedido->producto_id = $request->idProducto;
        $pedido->cantidad = $request->cantidad;
        $pedido->estado = "En proceso";
        $pedido->save();
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedidos $pedido)
    {
        $productos = producto::orderBy('nombreProducto','desc')->get();
        return view("pedidos.edit", compact("pedido"), compact("productos"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedidos $pedido)
    {
        $pedido->numeroTelefono = $request->numeroTelefono;
        $pedido->producto_id = $request->idProducto;
        $productos = producto::where('id', '=', $request->idProducto)->first();
        $pedido->cantidad = $request->cantidad;
        $pedido->estado = $request->estado;
        $pedido->save();
        $productos->stock -= $pedido->cantidad;
        $productos->save();
        return redirect()->route('pedidos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedidos $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index');
    }
}
