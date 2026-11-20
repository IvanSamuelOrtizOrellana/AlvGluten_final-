<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. 10 Usuarios (2 fijos + 8 generados)
        User::firstOrCreate(
            ['email' => 'admin@alvgluten.com'],
            [
                'name' => 'Admin Alvgluten',
                'password' => bcrypt('password'),
                'rol' => User::ROLE_ADMIN,
                'email_verified_at' => now(),
            ]
        );

        $cliente = User::firstOrCreate(
            ['email' => 'cliente@alvgluten.com'],
            [
                'name' => 'Cliente Prueba',
                'password' => bcrypt('password'),
                'rol' => User::ROLE_USER,
                'email_verified_at' => now(),
            ]
        );

        $clientesExtra = User::factory(8)->create();
        $todosLosClientes = $clientesExtra->push($cliente);

        // 2. 10 Categorías
        $categories = Category::factory(10)->create();

        // 3. 20 Productos (2 por cada categoría)
        $products = collect();
        foreach ($categories as $category) {
            $creados = Product::factory(2)->create([
                'category_id' => $category->id,
            ]);
            $products = $products->merge($creados);
        }

        // 4. 15 Relaciones en el carrito (tabla pivote product_user)
        $combinaciones = [];
        while (count($combinaciones) < 15) {
            $userId = $todosLosClientes->random()->id;
            $productId = $products->random()->id;
            $clave = "{$userId}-{$productId}";

            if (!isset($combinaciones[$clave])) {
                $combinaciones[$clave] = true;
                DB::table('product_user')->insert([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => rand(1, 3),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        // 5. 10 Órdenes y 6. 20 Artículos de órdenes (2 por orden)
        for ($i = 0; $i < 10; $i++) {
            $order = Order::factory()->create([
                'user_id' => $todosLosClientes->random()->id,
                'total' => 0,
            ]);

            $itemsProductos = $products->random(2);
            $totalOrden = 0;

            foreach ($itemsProductos as $producto) {
                $cantidad = rand(1, 4);

                OrderItem::factory()->create([
                    'order_id' => $order->id,
                    'product_id' => $producto->id,
                    'product_name' => $producto->name,
                    'unit_price' => $producto->price,
                    'quantity' => $cantidad,
                ]);

                $totalOrden += $producto->price * $cantidad;
            }

            $order->update(['total' => $totalOrden]);
        }
    }
}