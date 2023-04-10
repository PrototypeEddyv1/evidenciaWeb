<?php

namespace Database\Seeders;

use App\Models\producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto = new producto();
        $producto->nombreProducto = "Tubos de metal";
        $producto->descripcion = "Son tubos de metal de 1 diametro";
        $producto->precio = 12.00;
        $producto->stock = 18;
        $producto->save();

        $producto = new producto();
        $producto->nombreProducto = "Madera";
        $producto->descripcion = "Madera cortada de arboles";
        $producto->precio = 10.50;
        $producto->stock = 22;
        $producto->save();

        $producto = new producto();
        $producto->nombreProducto = "Ladrillos";
        $producto->descripcion = "Un paquete de 100 ladrillos";
        $producto->precio = 26.00;
        $producto->stock = 24;
        $producto->save();

        $producto = new producto();
        $producto->nombreProducto = "Cemento";
        $producto->descripcion = "Una bolsa de cemento (3 kilogramos)";
        $producto->precio = 20.00;
        $producto->stock = 15;
        $producto->save();

        $producto = new producto();
        $producto->nombreProducto = "Tierra";
        $producto->descripcion = "Una bolsa de tierra (5 kilogramos)";
        $producto->precio = 5.00;
        $producto->stock = 22;
        $producto->save();
    }
}
