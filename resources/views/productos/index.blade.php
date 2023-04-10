@extends('layouts.plantilla')

@section('titulo','Productos')

@section('contenido')
    <style>
        img {
            float: left;
            display: block;
            overflow: hidden;
            }
    </style>
    <h1>Productos</h1>
    <a href="productosCrear">Crear Producto</a>
    <br>
    <br>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
    @foreach ($productos as $producto)
        <tr>
            <td><img src="/images/{{$producto->imagen}}" alt="Imagen" width="100" height="100"></td>
            <td>{{ $producto->nombreProducto }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->precio}}</td>
            <td>{{ $producto->stock }}</td>
            <td><a href="/productoEditar/{{$producto->id}}">Editar</a></td>
            <td>
                <form action="/productoEliminado/{{$producto->id}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar">
                </form>
            </td>
        </tr>
    @endforeach
    </table>
@endsection