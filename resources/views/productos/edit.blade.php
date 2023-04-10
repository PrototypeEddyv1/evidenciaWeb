@extends('layouts.plantilla')

@section('titulo','Productos')

@section('contenido')
    <h1>Editando producto</h1>
    <form action="/productoEditado/{{$producto->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="nombreProducto">Nombre del producto</label>
        <input type="text" name="nombre" value="{{$producto->nombreProducto}}">
        <br>
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" value="{{$producto->descripcion}}">
        <br>
        <label for="precio">Precio</label>
        <input type="text" name="precio" value="{{$producto->precio}}">
        <br>
        <label for="stock">Stock</label>
        <input type="text" name="stock" value="{{$producto->stock}}">
        <br>
        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" value="{{$producto->imagen}}">
        <br>
        <input type="submit" value="Editar">
    </form>
    <br>
    <br>
    <a href="/productos">Volver</a>
@endsection