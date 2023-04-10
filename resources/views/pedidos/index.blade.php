@extends("layouts.plantilla")

@section("titulo","Pedidos")

@section("contenido")
    <h1>Pedidos</h1>
    <a href="pedidosCrear">Crear Pedido</a>
    <br>
    <br>
    <table>
        <tr>
            <th>No de telefono</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Precio total</th>
            <th>Estado</th>
        </tr>
    @foreach ($pedidos as $pedido)
        <tr>
            <?php $precioActual = 0;?>
            <?php $productoActual = "Producto";?>
            @foreach($productos as $producto)
                @if ($producto->id == $pedido->producto_id)
                    <?php $productoActual = $producto?>
                @endif
            @endforeach
            <td>{{$pedido->numeroTelefono}}</td>
            <td>{{$productoActual->nombreProducto}}</td>
            <td>{{$pedido->cantidad}}</td>
            <td>{{$productoActual->precio}}</td>
            <td>{{$productoActual->precio * $pedido->cantidad}}</td>
            <td>{{$pedido->estado}}</td>
            <td><a href="/pedidoEditar/{{$pedido->id}}">Editar</a></td>
            <td>
                <form action="/pedidoEliminado/{{$pedido->id}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Eliminar">
                </form>
            </td>
        </tr>
    @endforeach
    </table>
@endsection