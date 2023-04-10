@extends("layouts.plantilla")

@section("titulo","Pedidos")

@section("contenido")
    <h1>Creando pedido</h1>
    <form action="/pedidoGuardar" method="post">
        @csrf
        <label for="numeroTelefono">Numero de telefono</label>
        <input type="text" id="numeroTelefono" name="numeroTelefono">
        <br>
        <label for="idProducto">Producto</label>
        <select name="idProducto" id="idProducto">
            @foreach ($productos as $producto)
                    <option value="{{$producto->id}}">{{$producto->nombreProducto}} $ - {{$producto->precio}}</a>
            @endforeach
        </select>
        <br>
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad">
        <br>   
        <input type="submit" value="Agregar">
    </form>
    <br>
    <br>
    <a href="/pedidos">Regresar</a>
@endsection