@extends('layouts.plantilla')

@section('titulo','Productos')

@section('contenido')
    <h1>Creando producto</h1>
    <form action="productoGuardar" method="post" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="descripcion">descripcion</label>
        <input type="text" name="descripcion" id="descripcion">
        <br>
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <br>
        <label for="imagen">Imagen</label>
        <input type="file" name="imagenFile" id="imagenFile">
        <br>
        <label for="stock">Stock</label>
        <input type="text" name="stock" id="stock">
        <br>
        <input type="submit" value="Agregar">
    </form>
    <br>
    <br>
    <a href="/productos">Volver</a>
@endsection