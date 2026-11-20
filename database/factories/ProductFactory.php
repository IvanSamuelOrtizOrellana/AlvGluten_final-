<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected static array $productos = [
        ['Pan de Caja Integral Sin Gluten', 'Pan suave de harina de arroz integral y semillas de chía.', 95.00],
        ['Baguette Artesanal de Maíz', 'Corteza crujiente y miga ligera libre de TACC.', 78.50],
        ['Harina de Almendra Blanqueada 500g', 'Ideal para repostería keto y libre de gluten.', 185.00],
        ['Harina de Arroz Orgánica 1kg', 'Molienda fina perfecta para salsas, panes y hot cakes.', 68.00],
        ['Espagueti de Lenteja Roja 250g', 'Pasta alta en proteína y 100% libre de gluten.', 74.00],
        ['Fusilli de Maíz y Arroz 500g', 'Textura al dente tradicional sin trigo.', 62.00],
        ['Galletas de Chispas de Chocolate GF', 'Horneadas con harina de avena certificada sin gluten.', 89.00],
        ['Totopos de Maíz Azul Horneados', 'Snack crujiente con sal de mar, libre de trazas.', 55.00],
        ['Brownie de Cacao Sin TACC', 'Húmedo y con trozos de nuez, apto para celíacos.', 110.00],
        ['Muffins de Arándano (Pack 4)', 'Esponjosos y elaborados con harina de coco.', 125.00],
        ['Granola Crujiente de Miel y Nueces', 'Mezcla tostada sin gluten para el desayuno.', 135.00],
        ['Hojuelas de Maíz Natural Sin Azúcar', 'Cereal clásico certificado libre de gluten.', 82.00],
        ['Base para Pizza de Coliflor (2 pzas)', 'Lista para hornear con tus ingredientes favoritos.', 140.00],
        ['Tortillas de Nopal y Maíz 500g', 'Flexibles, ligeras y sin conservadores.', 48.00],
        ['Salsa Tamari Orgánica 250ml', 'Salsa de soya fermentada naturalmente sin trigo.', 115.00],
        ['Salsa Pesto de Albahaca Certificada', 'Elaborada con aceite de oliva extra virgen y piñón.', 128.00],
        ['Bebida de Almendra Sin Azúcar 1L', 'Fortificada con calcio y vitamina D.', 58.00],
        ['Bebida de Coco Barista 1L', 'Cremosa, ideal para café y licuados.', 64.00],
        ['Chocolate Amargo 70% Cacao GF', 'Libre de gluten y trazas de lácteos.', 79.00],
        ['Gomitas de Fruta Natural Sin Gluten', 'Endulzadas con jugo de fruta real.', 45.00],
    ];

    public function definition(): array
    {
        $item = fake()->unique()->randomElement(self::$productos);

        return [
            'name' => $item[0],
            'description' => $item[1],
            'price' => $item[2],
            'is_gluten_free' => true,
            'image_path' => null,
            'category_id' => Category::inRandomOrder()->value('id') ?? Category::factory(),
        ];
    }
}