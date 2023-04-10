<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = producto::orderBy('id','desc')->get();
        return view("productos.index", compact("productos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("productos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto = new producto();
        $imageFile = $request->file('imagenFile');
        $imageName = time() . '.' . $imageFile->extension();
        $imageFile->move(public_path('images'), $imageName);
        $producto->imagen = $imageName;
        $producto->nombreProducto = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->save();
        return redirect()->route("productos.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto)
    {
        return view("productos.edit", compact("producto"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, producto $producto)
    {
        $imageFile = $request->file('imagen');
        if ($imageFile != null) {
            $imageName = time() . '.' . $imageFile->extension();
            $imageFile->move(public_path('images'), $imageName);
            $producto->imagen = $imageName;
        }
        $producto->nombreProducto = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->save();
        return redirect()->route("productos.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(producto $producto)
    {
        $producto->delete();
        return redirect()->route("productos.index");
    }
}
