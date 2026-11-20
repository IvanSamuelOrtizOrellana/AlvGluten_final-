<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected static array $categorias = [
        'Panadería Sin Gluten' => 'Panes artesanales horneados con harinas certificadas libres de gluten.',
        'Harinas Alternativas' => 'Harinas de almendra, arroz, garbanzo, coco y tapioca sin contaminación cruzada.',
        'Pastas Sin TACC' => 'Pastas elaboradas a base de maíz, arroz integral y legumbres.',
        'Galletas y Snacks' => 'Opciones crujientes dulces y saladas aptas para celíacos.',
        'Repostería Celíaca' => 'Pasteles, brownies y muffins 100% libres de trigo, avena, cebada y centeno.',
        'Cereales y Granolas' => 'Desayunos energéticos sin trazas de gluten.',
        'Pizzas y Masas' => 'Bases listas para hornear, empanadas y tortillas sin gluten.',
        'Salsas y Condimentos' => 'Aderezos, salsas de soya tamari y especias certificadas.',
        'Bebidas Vegetales' => 'Leches vegetales y bebidas nutritivas libres de alérgenos.',
        'Chocolates y Dulces' => 'Confitería y chocolates puros con sello sin gluten.',
    ];

    public function definition(): array
    {
        $nombre = fake()->unique()->randomElement(array_keys(self::$categorias));

        return [
            'name' => $nombre,
            'description' => self::$categorias[$nombre],
        ];
    }
}