<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Bebidas
            [
                'category_id' => 1,
                'name' => 'Café Latte',
                'description' => 'Café con leche cremosa y un toque de espresso.',
                'price' => 15.50,
                'stock' => 50,
                'image_public_id' => 'cafe_latte_qjykmg',
            ],
            [
                'category_id' => 1,
                'name' => 'Jugo Natural de Naranja',
                'description' => 'Jugo fresco de naranjas naturales, sin azúcar añadida.',
                'price' => 12.00,
                'stock' => 30,
                'image_public_id' => 'jugo_naranja_yqpzwj',
            ],
            [
                'category_id' => 1,
                'name' => 'Agua Mineral',
                'description' => 'Agua purificada en botella de 500 ml.',
                'price' => 5.00,
                'stock' => 100,
                'image_public_id' => 'agua_mineral_hfrgzq',
            ],
            [
                'category_id' => 1,
                'name' => 'Inka Cola',
                'description' => 'Gaseosa con saborizante en botella de 500 ml.',
                'price' => 8.00,
                'stock' => 40,
                'image_public_id' => 'inka_cola_xvyoyc',
            ],
            [
                'category_id' => 1,
                'name' => 'Café Americano',
                'description' => 'Café negro fuerte, con un sabor robusto.',
                'price' => 10.00,
                'stock' => 70,
                'image_public_id' => 'cafe_americano_wl7lop',
            ],
            [
                'category_id' => 1,
                'name' => 'Cappuccino',
                'description' => 'Café espresso con leche vaporizada y espuma.',
                'price' => 13.00,
                'stock' => 50,
                'image_public_id' => 'cappuccino_p9ta35',
            ],
            // Snacks
            [
                'category_id' => 2,
                'name' => 'Papas Fritas',
                'description' => 'Papas fritas crocantes con sal.',
                'price' => 4.50,
                'stock' => 200,
                'image_public_id' => 'papas_fritas_tpa8tn',
            ],
            [
                'category_id' => 2,
                'name' => 'Almendras Tostadas',
                'description' => 'Almendras naturales tostadas y saladas.',
                'price' => 7.00,
                'stock' => 80,
                'image_public_id' => 'almendras_tostadas_lz56wq',
            ],
            [
                'category_id' => 2,
                'name' => 'Chocolinas',
                'description' => 'Galletas de chocolate suave.',
                'price' => 5.00,
                'stock' => 150,
                'image_public_id' => 'chocolinas_ecbrqo',
            ],
            [
                'category_id' => 2,
                'name' => 'Barra de Granola',
                'description' => 'Barra de granola con frutos secos.',
                'price' => 3.50,
                'stock' => 60,
                'image_public_id' => 'barra_granola_atq9kq',
            ],
            [
                'category_id' => 2,
                'name' => 'Galletas de Avena',
                'description' => 'Galletas de avena con pasas y miel.',
                'price' => 4.00,
                'stock' => 120,
                'image_public_id' => 'galletas_avena_hp52pr',
            ],
            [
                'category_id' => 2,
                'name' => 'Palomitas de Maíz',
                'description' => 'Palomitas de maíz con sal y mantequilla.',
                'price' => 6.00,
                'stock' => 200,
                'image_public_id' => 'palomitas_maiz_gsqyyf',
            ],
            // Postres
            [
                'category_id' => 3,
                'name' => 'Tarta de Fresa',
                'description' => 'Tarta con base de galleta y fresas frescas.',
                'price' => 20.00,
                'stock' => 30,
                'image_public_id' => 'tarta_fresa_ynj3vj',
            ],
            [
                'category_id' => 3,
                'name' => 'Mousse de Chocolate',
                'description' => 'Mousse suave con intenso sabor a chocolate.',
                'price' => 15.00,
                'stock' => 50,
                'image_public_id' => 'mousse_chocolate_qphbq2',
            ],
            [
                'category_id' => 3,
                'name' => 'Brownie',
                'description' => 'Delicioso brownie de chocolate con nueces.',
                'price' => 12.00,
                'stock' => 100,
                'image_public_id' => 'brownie_mquvim',
            ],
            [
                'category_id' => 3,
                'name' => 'Helado de Vainilla',
                'description' => 'Helado cremoso de vainilla con trozos de chocolate.',
                'price' => 8.00,
                'stock' => 80,
                'image_public_id' => 'helado_vainilla_gpauln',
            ],
            [
                'category_id' => 3,
                'name' => 'Tiramisu',
                'description' => 'Postre italiano con capas de café y crema.',
                'price' => 18.00,
                'stock' => 40,
                'image_public_id' => 'tiramisu_bfz6a4',
            ],
            [
                'category_id' => 3,
                'name' => 'Cheesecake',
                'description' => 'Tarta de queso con base de galleta y topping de frutos rojos.',
                'price' => 22.00,
                'stock' => 20,
                'image_public_id' => 'cheesecake_su0bwq',
            ],
            // Comida Rápida
            [
                'category_id' => 4,
                'name' => 'Hamburguesa Clásica',
                'description' => 'Hamburguesa de carne con lechuga, tomate y mayonesa.',
                'price' => 18.00,
                'stock' => 60,
                'image_public_id' => 'hamburguesa_clasica_yuwvcr',
            ],
            [
                'category_id' => 4,
                'name' => 'Papas Fritas con Queso',
                'description' => 'Papas fritas acompañadas de queso derretido.',
                'price' => 10.00,
                'stock' => 100,
                'image_public_id' => 'papas_fritas_con_queso_skl7h0',
            ],
            [
                'category_id' => 4,
                'name' => 'Pizza Margarita',
                'description' => 'Pizza con salsa de tomate, queso mozzarella y albahaca.',
                'price' => 22.00,
                'stock' => 40,
                'image_public_id' => 'pizza_margarita_xrhx23',
            ],
            [
                'category_id' => 4,
                'name' => 'Hot Dog',
                'description' => 'Perro caliente con mostaza y ketchup.',
                'price' => 7.50,
                'stock' => 150,
                'image_public_id' => 'hot_dog_cphubz',
            ],
            [
                'category_id' => 4,
                'name' => 'Sandwich de Pollo',
                'description' => 'Sandwich con pechuga de pollo a la parrilla, lechuga y mayonesa.',
                'price' => 12.00,
                'stock' => 80,
                'image_public_id' => 'sandwich_pollo_vwmzsp',
            ],
            [
                'category_id' => 4,
                'name' => 'Wrap de Vegetales',
                'description' => 'Wrap con vegetales frescos, hummus y salsa ligera.',
                'price' => 9.00,
                'stock' => 60,
                'image_public_id' => 'wrap_vegetales_ujeu5m',
            ],
        ];

        // Foreach para guardar productos en la base de datos
        foreach ($products as $product) {
            Product::create([
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'image_public_id' => $product['image_public_id'],
            ]);
        }
    }
}
