@extends("layouts.plantilla")

@section("titulo","Pedidos")

@section("contenido")
    <h1>Editando producto</h1>
    <form action="/pedidoEditado/{{$pedido->id}}" method="post">
        @csrf
        @method('put')
        <label for="numeroTelefono">Numero de telefono</label>
        <input type="text" id="numeroTelefono" name="numeroTelefono" value="{{$pedido->numeroTelefono}}">
        <br>
        <label for="idProducto">Producto</label>
        <select name="idProducto" id="idProducto" value="{{$pedido->producto_id}}">
            @foreach ($productos as $producto)
                    <option value="{{$producto->id}}" <?php 
                    if ($producto->id == $pedido->producto_id){echo 'selected';};
                    ?>>{{$producto->nombreProducto}} $ - {{$producto->precio}}</a>
            @endforeach
        </select>
        <br>
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" value="{{$pedido->cantidad}}">
        <br>
        <label for="estado">Estado</label>
        <select name="estado" id="estado" value="{{$pedido->estado}}">
            <option value="En proceso" <?php if ($pedido->estado == "En proceso") {echo 'selected';};?>>En proceso</option>
            <option value="En ruta" <?php if ($pedido->estado == "En ruta") {echo 'selected';};?>>En ruta</option>
            <option value="Entregado" <?php if ($pedido->estado == "Entregado") {echo 'selected';};?>>Entregado</option>
        </select>
        <br>   
        <input type="submit" value="Hacer cambios">
    </form>
    <br>
    <br>
    <a href="/pedidos">Regresar</a>
@endsection