<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        // Bebidas
        Product::create([
            'category_id' => 1, // Asegúrate de que el id de la categoría Bebidas sea el correcto
            'name' => 'Café Latte',
            'description' => 'Café con leche cremosa y un toque de espresso.',
            'price' => 15.50,
            'stock' => 50,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Jugo Natural de Naranja',
            'description' => 'Jugo fresco de naranjas naturales, sin azúcar añadida.',
            'price' => 12.00,
            'stock' => 30,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Agua Mineral',
            'description' => 'Agua purificada en botella de 500 ml.',
            'price' => 5.00,
            'stock' => 100,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Inka Cola',
            'description' => 'Gaseosa con saborisante en botella de 500 ml.',
            'price' => 8.00,
            'stock' => 40,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Café Americano',
            'description' => 'Café negro fuerte, con un sabor robusto.',
            'price' => 10.00,
            'stock' => 70,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 1,
            'name' => 'Cappuccino',
            'description' => 'Café espresso con leche vaporizada y espuma.',
            'price' => 13.00,
            'stock' => 50,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        // Snacks
        Product::create([
            'category_id' => 2, // Asegúrate de que el id de la categoría Snacks sea el correcto
            'name' => 'Papas Fritas',
            'description' => 'Papas fritas crocantes con sal.',
            'price' => 4.50,
            'stock' => 200,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Almendras Tostadas',
            'description' => 'Almendras naturales tostadas y saladas.',
            'price' => 7.00,
            'stock' => 80,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Chocolinas',
            'description' => 'Galletas de chocolate suave.',
            'price' => 5.00,
            'stock' => 150,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Barra de Granola',
            'description' => 'Barra de granola con frutos secos.',
            'price' => 3.50,
            'stock' => 60,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Galletas de Avena',
            'description' => 'Galletas de avena con pasas y miel.',
            'price' => 4.00,
            'stock' => 120,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 2,
            'name' => 'Palomitas de Maíz',
            'description' => 'Palomitas de maíz con sal y mantequilla.',
            'price' => 6.00,
            'stock' => 200,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        // Postres
        Product::create([
            'category_id' => 3, // Asegúrate de que el id de la categoría Postres sea el correcto
            'name' => 'Tarta de Fresa',
            'description' => 'Tarta con base de galleta y fresas frescas.',
            'price' => 20.00,
            'stock' => 30,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Mousse de Chocolate',
            'description' => 'Mousse suave con intenso sabor a chocolate.',
            'price' => 15.00,
            'stock' => 50,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Brownie',
            'description' => 'Delicioso brownie de chocolate con nueces.',
            'price' => 12.00,
            'stock' => 100,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Helado de Vainilla',
            'description' => 'Helado cremoso de vainilla con trozos de chocolate.',
            'price' => 8.00,
            'stock' => 80,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Tiramisu',
            'description' => 'Postre italiano con capas de café y crema.',
            'price' => 18.00,
            'stock' => 40,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 3,
            'name' => 'Cheesecake',
            'description' => 'Tarta de queso con base de galleta y topping de frutos rojos.',
            'price' => 22.00,
            'stock' => 20,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        // Comida Rápida
        Product::create([
            'category_id' => 4, // Asegúrate de que el id de la categoría Comida Rápida sea el correcto
            'name' => 'Hamburguesa Clásica',
            'description' => 'Hamburguesa de carne con lechuga, tomate y mayonesa.',
            'price' => 18.00,
            'stock' => 60,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Papas Fritas con Queso',
            'description' => 'Papas fritas acompañadas de queso derretido.',
            'price' => 10.00,
            'stock' => 100,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Pizza Margarita',
            'description' => 'Pizza con salsa de tomate, queso mozzarella y albahaca.',
            'price' => 22.00,
            'stock' => 40,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Hot Dog',
            'description' => 'Perro caliente con mostaza y ketchup.',
            'price' => 7.50,
            'stock' => 150,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Sandwich de Pollo',
            'description' => 'Sandwich con pechuga de pollo a la parrilla, lechuga y mayonesa.',
            'price' => 12.00,
            'stock' => 80,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);

        Product::create([
            'category_id' => 4,
            'name' => 'Wrap de Vegetales',
            'description' => 'Wrap con vegetales frescos, hummus y salsa ligera.',
            'price' => 9.00,
            'stock' => 60,
            'image_url' => 'url_de_imagen_del_producto',
            'image_public_id' => 'id_publico_imagen'
        ]);
    }
}
