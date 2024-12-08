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
            [
                'category_id' => 1,
                'name' => 'Coca Cola',
                'description' => 'Bebida refrescante con sabor a cola.',
                'price' => 5.50,  
                'stock' => 15,     
                'image_public_id' => 'Coca_Cola_wydqpc',
            ],
            [
                'category_id' => 1,
                'name' => 'Frape de oreo',
                'description' => 'Café espresso con leche vaporizada y espuma, con sabor a Oreo.',
                'price' => 16.50,  
                'stock' => 50,                     
                'image_public_id' => 'Frape_de_oreo_x51grq',
            ],
            [
                'category_id' => 1,
                'name' => 'Frape de Capuchino',
                'description' => 'Café espresso con leche vaporizada y espuma.',
                'price' => 16.00,  
                'stock' => 50,                     
                'image_public_id' => 'Frape_de_Capuchino_p84hur',
            ],
            [
                'category_id' => 1,
                'name' => 'San Mateo',
                'description' => 'Agua Natural, enbotellada.',
                'price' => 16.00,  
                'stock' => 50,                     
                'image_public_id' => 'San_Mateo_lwcmis',
            ],
            [
                'category_id' => 1,
                'name' => 'Guarana',
                'description' => 'Refresco de guaraná, una bebida energizante y refrescante.',
                'price' => 6.00,   
                'stock' => 15,     
                'image_public_id' => 'Guarana_ijuv8a',
            ],
            [
                'category_id' => 1,
                'name' => 'Fanta',
                'description' => 'Bebida refrescante con sabor a naranja.',
                'price' => 6.50,   
                'stock' => 15,     
                'image_public_id' => 'Fanta_t15fqg',
            ],
            [
                'category_id' => 1,
                'name' => 'Anis',
                'description' => 'Bebida con sabor a anís, refrescante y aromática.',
                'price' => 6.00,   
                'stock' => 15,     
                'image_public_id' => 'Anis_hhqivu',
            ],
            [
                'category_id' => 1,
                'name' => 'Te verde',
                'description' => 'Infusión de té verde con propiedades antioxidantes.',
                'price' => 6.50,   
                'stock' => 15,     
                'image_public_id' => 'Te_verde_oe9mfm',
            ],
            [
                'category_id' => 1,
                'name' => 'Manzanilla',
                'description' => 'Infusión de manzanilla, ideal para relajarse.',
                'price' => 6.50,   
                'stock' => 15,     
                'image_public_id' => 'Manzanilla_ff0682',
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
            [
                'category_id' => 2,
                'name' => 'Tortillas Chips',
                'description' => 'Crujientes tortillas de maíz, ideales para dippear con salsa.',
                'price' => 3.00,
                'stock' => 180,
                'image_public_id' => 'Tortillas_Chips_uabjyj',
            ],
            [
                'category_id' => 2,
                'name' => 'Frutos Secos Mixtos',
                'description' => 'Mezcla de nueces, pistachos, almendras y avellanas, un snack energético.',
                'price' => 5.00,
                'stock' => 100,
                'image_public_id' => 'Frutos_Secos_Mixto_gqqr98',
            ],
            [
                'category_id' => 2,
                'name' => 'Galletas de Chocolate Blanco',
                'description' => 'Deliciosas galletas con trozos de chocolate blanco, suaves y esponjosas.',
                'price' => 4.50,
                'stock' => 150,
                'image_public_id' => 'Galletas_de_Chocolate_Blanco_zipfn7',
            ],
            [
                'category_id' => 2,
                'name' => 'Fruta Deshidratada',
                'description' => 'Mezcla de frutas deshidratadas como manzana, fresa y plátano, sin azúcar añadida.',
                'price' => 3.80,
                'stock' => 120,
                'image_public_id' => 'Fruta_Deshidratada_p0icaw',
            ],
            [
                'category_id' => 2,
                'name' => 'Mini Muffins',
                'description' => 'Pequeños muffins de arándano y vainilla, perfectos para una merienda.',
                'price' => 2.50,
                'stock' => 150,
                'image_public_id' => 'Mini_Muffins_eccry7',
            ],
            [
                'category_id' => 2,
                'name' => 'Barras Energéticas',
                'description' => 'Barras energéticas con avena, frutos secos y miel, ideales para mantener la energía.',
                'price' => 4.20,
                'stock' => 100,
                'image_public_id' => 'Barras_Energéticas_cmyqof',
            ],
            [
                'category_id' => 2,
                'name' => 'Chicles de Frutas',
                'description' => 'Chicles de frutas, frescos y dulces, para disfrutar entre clases.',
                'price' => 1.00,
                'stock' => 180,
                'image_public_id' => 'Chicles_de_Frutas_kb9jzj',
            ],
            [
                'category_id' => 2,
                'name' => 'Cereal Mix',
                'description' => 'Mezcla de cereales crujientes, ideales para picar en cualquier momento.',
                'price' => 3.20,
                'stock' => 140,
                'image_public_id' => 'Cereal_Mix_maoowu',
            ],
            [
                'category_id' => 2,
                'name' => 'Bocaditos de Queso',
                'description' => 'Bocaditos crujientes rellenos de queso, perfectos para disfrutar durante el estudio.',
                'price' => 2.80,
                'stock' => 160,
                'image_public_id' => 'Bocaditos_de_Queso_yq33xl',
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
            [
                'category_id' => 3,
                'name' => 'Cupcakes de Vainilla',
                'description' => 'Pequeños pastelitos de vainilla con crema de mantequilla y chispas de colores.',
                'price' => 6.00,
                'stock' => 120,
                'image_public_id' => 'Cupcakes_de_Vainilla_pgprdm',
            ],
            [
                'category_id' => 3,
                'name' => 'Galletas de Chocolate y Nuez',
                'description' => 'Galletas crujientes con trozos de chocolate y nueces tostadas.',
                'price' => 4.00,
                'stock' => 200,
                'image_public_id' => 'Galletas_de_Chocolate_y_Nuez_rqtxgl',
            ],
            [
                'category_id' => 3,
                'name' => 'Panna Cotta',
                'description' => 'Postre italiano de crema con un toque de vainilla, servido con frutas frescas.',
                'price' => 12.00,
                'stock' => 60,
                'image_public_id' => 'Panna_Cotta_v7abtb',
            ],
            [
                'category_id' => 3,
                'name' => 'Pastel de Limón',
                'description' => 'Pastel esponjoso con un toque ácido de limón y glaseado suave.',
                'price' => 10.00,
                'stock' => 90,
                'image_public_id' => 'Pastel_de_Limón_di1g14',
            ],
            [
                'category_id' => 3,
                'name' => 'Clafoutis de Cereza',
                'description' => 'Delicioso postre francés con cerezas frescas cubiertas con una mezcla de huevo y crema.',
                'price' => 14.00,
                'stock' => 40,
                'image_public_id' => 'Clafoutis_de_Cereza_mlyzsi',
            ],
            [
                'category_id' => 3,
                'name' => 'Macarons',
                'description' => 'Galletas francesas de merengue rellenas con ganache de chocolate o crema de frutas.',
                'price' => 5.50,
                'stock' => 150,
                'image_public_id' => 'Macarons_sgfnfk',
            ],
            [
                'category_id' => 3,
                'name' => 'Crumble de Manzana',
                'description' => 'Postre casero de manzanas con una capa crujiente de avena y azúcar moreno.',
                'price' => 9.00,
                'stock' => 70,
                'image_public_id' => 'Crumble_de_Manzana_ajq06a',
            ],
            [
                'category_id' => 3,
                'name' => 'Pastel de Zanahoria',
                'description' => 'Delicioso pastel de zanahoria con nueces y un suave glaseado de queso crema.',
                'price' => 12.50,
                'stock' => 100,
                'image_public_id' => 'Pastel_de_Zanahoria_lqdh72',
            ],
            [
                'category_id' => 3,
                'name' => 'Flan de Coco',
                'description' => 'Flan cremoso con un toque tropical de coco, ideal para los amantes de los sabores exóticos.',
                'price' => 8.50,
                'stock' => 80,
                'image_public_id' => 'Flan_de_Coco_webczg',
            ],
            [
                'category_id' => 3,
                'name' => 'Tarta de Manzana',
                'description' => 'Tarta de manzana con una masa crujiente y un toque de canela.',
                'price' => 11.00,
                'stock' => 50,
                'image_public_id' => 'Tarta_de_Manzana_l7tte8',
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
                'name' => 'Burrito de Carne',
                'description' => 'Burrito relleno con carne de res, frijoles, arroz, guacamole y salsa picante.',
                'price' => 9.50,
                'stock' => 100,
                'image_public_id' => 'Burrito_de_Carne_aqysse',
            ],
            [
                'category_id' => 4,
                'name' => 'Nachos con Carne',
                'description' => 'Totopos de maíz cubiertos con carne molida, queso cheddar y jalapeños.',
                'price' => 8.00,
                'stock' => 150,
                'image_public_id' => 'Nachos_con_Carne_ffu2he',
            ],
            [
                'category_id' => 4,
                'name' => 'Quesadilla de Pollo',
                'description' => 'Tortilla rellena de pollo, queso derretido, cebolla y pimientos.',
                'price' => 7.00,
                'stock' => 120,
                'image_public_id' => 'Quesadilla_de_Pollo_fpnauk',
            ],
            [
                'category_id' => 4,
                'name' => 'Wrap Vegetariano',
                'description' => 'Wrap con vegetales frescos, hummus y aderezo de yogurt.',
                'price' => 6.50,
                'stock' => 90,
                'image_public_id' => 'Wrap_Vegetariano_stojmb',
            ],
            [
                'category_id' => 4,
                'name' => 'Tacos al Pastor',
                'description' => 'Tacos con carne al pastor, cebolla, cilantro y salsa roja.',
                'price' => 5.50,
                'stock' => 200,
                'image_public_id' => 'Tacos_al_Pastor_lpowzg',
            ],
            [
                'category_id' => 4,
                'name' => 'Alitas de Pollo',
                'description' => 'Alitas de pollo fritas con salsa BBQ o picante.',
                'price' => 11.00,
                'stock' => 50,
                'image_public_id' => 'Alitas_de_Pollo_vl3pxa',
            ],
            [
                'category_id' => 4,
                'name' => 'Papas Fritas',
                'description' => 'Papas fritas crujientes servidas con ketchup.',
                'price' => 4.00,
                'stock' => 180,
                'image_public_id' => 'Papas_Fritas_hokyyf',
            ],
            [
                'category_id' => 4,
                'name' => 'Pasta al Pesto',
                'description' => 'Pasta con salsa pesto de albahaca, piñones y queso parmesano.',
                'price' => 13.00,
                'stock' => 70,
                'image_public_id' => 'Pasta_al_Pesto_qtlssf',
            ],
            [
                'category_id' => 4,
                'name' => 'Tostada de Aguacate',
                'description' => 'Tostada integral con aguacate, tomate y huevo pochado.',
                'price' => 6.00,
                'stock' => 150,
                'image_public_id' => 'Tostada_de_Aguacate_nlkvsn',
            ],
            [
                'category_id' => 4,
                'name' => 'Sushi Roll',
                'description' => 'Rollos de sushi con atún, aguacate y pepino.',
                'price' => 14.00,
                'stock' => 40,
                'image_public_id' => 'Sushi_Roll_fjiaap',
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
