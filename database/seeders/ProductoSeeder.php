<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $bicicletas = [
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/aktiv-10-300x300.jpg",
                "descripcion" => "La bicicleta eléctrica Trekking Aktiv de Biwbik es perfecta para aquellos que buscan una bicicleta polivalente de alta calidad y rendimiento para sus aventuras al aire libre. Con su potente motor eléctrico de 250W, la Trekking Aktiv te permite viajar más lejos y con menos esfuerzo, lo que la convierte en una excelente opción para viajes largos y terrenos difíciles.",
                "categoria_id" => 2,
                "nombre" => "Bicicleta de paseo AKTIV",
                "precio" => "2,049.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/bicicleta-electrica-paseo-malmo-300x300.jpg",
                "descripcion" => "La marca Biwbik ofrece una bicicleta perfecta para desplazarse tranquilamente por la ciudad. La bicicleta eléctrica Malmo tiene un motor Brushless de 250W que lo permite alcanzar una potencia especialmente alta.\n\nCon una batería Litio 37V-13Ah, la bicicleta puede recorrer una autonomía de 45Km hasta 96Km.\n\nTodo esto en tan solo 25 kg de peso con la batería incluida! Así que está ligera y muy práctica.",
                "categoria_id" => 2,
                "nombre" => "Bicicleta de paseo Biwbik Malmo",
                "precio" => "1,249.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/bicicleta-electrica-sunray200-negra-300x300.jpg",
                "descripcion" => "La marca Biwbik ofrece una bicicleta perfecta para desplazarse tranquilamente por la ciudad. La bicicleta eléctrica Sunray 200 tiene un motor Brushless de 250W que lo permite alcanzar una potencia especialmente alta.\n\nCon una batería Litio 36V-12Ah, la bicicleta puede recorrer una autonomía de 35Km hasta 65Km.\n\nTodo esto en tan solo 26 kg de peso con la batería incluida! Así que está ligera y muy práctica.",
                "categoria_id" => 2,
                "nombre" => "Bicicleta de paseo Biwbik Sunray",
                "precio" => "1,049.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/bicicleta-electrica-gante-blanca-300x300.jpg",
                "descripcion" => "La marca Biwbik ofrece una bicicleta perfecta para desplazarse tranquilamente por la ciudad. La bicicleta eléctrica Gante tiene un motor Brushless de 250W que lo permite alcanzar una potencia especialmente alta.\n\nCon una batería Litio de 36V-12Ah, la bicicleta puede recorrer una autonomía de hasta 80 km\/h.\n\nTodo esto en tan solo 26 kg de peso con la batería incluida! Así que está ligera y muy práctica.",
                "categoria_id" => 2,
                "nombre" => "Bicicleta de paseo Gante",
                "precio" => "1,024.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/05/bicicleta-electrica-plegable-traveller-all-road-white-cincobikes-cm5-01-600x600-1-300x300.jpeg",
                "descripcion" => "Esta bicicleta tiene un motor Brushless de 250W que lo permite alcanzar una potencia especialmente alta. Tiene dos modelos de batería: una batería de 36V 12Ah y otra de 36V 17,5Ah para que la bicicleta pueda alcanzar una autonomía de 45 a 80 km.\n\nTodo esto en tan solo 21 kg de peso con la batería incluida! Así que está ligera y muy práctica.\n\nEstá disponible en blanco, negro para que puedas elegir según tu gusto.",
                "categoria_id" => 2,
                "nombre" => "Bicicleta Eléctrica Biwbik All Road HD",
                "precio" => "1,049.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2022/04/capri-silver-1-300x300.jpg",
                "descripcion" => "Nuevo modelo de bicicleta eléctrica plegable Biwbik.\n\nMás ligera gracias a su cuadro de aluminio y con ruedas más anchas para circular por cualquier terreno. Además, con Frenos hidráulicos.\n\nEl mejor precio en una bicicleta eléctrica de sus características.\n\n* El puño acelerador se entrega instalado si se compra junto a la bicicleta. El adecuado uso será bajo la total responsabilidad del cliente, en ámbito privado y no en vías públicas.",
                "categoria_id" => 2,
                "nombre" => "Bicicleta eléctrica Biwbik Capri Silver | Black",
                "precio" => "1,224.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/06/kone1-300x300.jpg",
                "descripcion" => "La bicicleta eléctrica Kone tiene un motor VINKA E40N de 250W para que la bicicleta alcance una potencia especialmente alta.\n\nPuedes elegir entre dos baterías: una de 36V 14,5Ah y otra de 36V 20Ah. Con estas baterías, la bicicleta puede recorrer una autonomía máxima entre 60 a 95 km.\n\nCon sus frenos de disco hidráulico Tektro HD M-275, uno delantero y otro trasero, te permitirás frenar con seguridad. Su cambio Shimano Altus 8 velocidades, te garantizará un cambio preciso y una velocidad de crucero fácil de alcanzar.",
                "categoria_id" => 2,
                "nombre" => "Bicicleta Eléctrica Biwbik Kone",
                "precio" => "1,824.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2024/01/roma20-300x300.jpg",
                "descripcion" => "Bicicleta Eléctrica Biwbik Roma 20\n",
                "categoria_id" => 2,
                "nombre" => "Bicicleta Eléctrica Biwbik Roma 20",
                "precio" => "1,399.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2024/01/roma20plus-300x300.jpg",
                "descripcion" => "Bicicleta eléctrica plegable Biwbik Roma 20+. Permite realizar cómodos trayecto gracias a su Pedaleo asistido (PAS) Aprobado CE con 5 niveles de asistencia. Motor central VINKA E40N, 250W – 80Nm 110Rpm Sensor Torque Vinka DR23. Cambios Shimano Altus ARDM310DLC. Ruedas de 20×2,25 antipinchazos. Dispone de un Display LCD con 5 velocidades. Con sus frenos delanteros y traseros de disco hidráulico RUSH con disco 180mm podrás frenar con seguridad. Recorre una Autonomía estimada entre 35Km-100Km.",
                "categoria_id" => 2,
                "nombre" => "Bicicleta Eléctrica Biwbik Roma 20+",
                "precio" => "1,999.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/bicicleta-electrica-plegable-boston-white-300x300.jpg",
                "descripcion" => "Esta bicicleta tiene un motor Brushless de 250W que lo permite alcanzar una potencia especialmente alta. Con su batería Litio 36V-12Ah, la bicicleta puede recorrer una autonomía de 45 hasta 80 km.\n\nTodo esto en tan solo 24 kg de peso con la batería incluida! Así que está ligera y muy práctica.\n\nEstá disponible en blanco, negro para que puedas elegir según tu gusto.\n\nCon sus frenos de disco hidráulico LOGAN F8000 160mm, uno delantero y otro trasero, te permitirás frenar con seguridad. Su cambio Shimano 6 velocidades, te garantizará un cambio preciso y una velocidad de crucero fácil de alcanzar.",
                "categoria_id" => 2,
                "nombre" => "Bicicleta plegable Biwbik Boston",
                "precio" => "1,024.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/bicicleta-electrica-plegable-traveller-white-300x300.jpg",
                "descripcion" => "Esta bicicleta tiene un motor Brushless de 250W que lo permite alcanzar una potencia especialmente alta. Tiene dos modelos de batería: una batería de 36V 12Ah y otra de 36V 17,5Ah, con las que la bicicleta puede alcanzar una autonomía de 45 a 80 km.\n\nTodo esto en tan solo 21 kg de peso con la batería incluida! Así que está ligera y muy práctica.\n\nEstá disponible en blanco, negro para que puedas elegir según tu gusto.\n\nCon sus frenos de disco hidráulico LOGAN F8000 160mm, uno delantero y otro trasero, te permitirás frenar con seguridad. Su cambio Shimano Tourney TZ 6 velocidades, te garantizará un cambio preciso y una velocidad de crucero fácil de alcanzar.",
                "categoria_id" => 2,
                "nombre" => "Bicicleta plegable Biwbik Traveller",
                "precio" => "1,124.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/bicicleta-electrica-plegable-traveller-platinum-300x300.jpg",
                "descripcion" => "Esta bicicleta tiene un motor Brushless de 250W que lo permite alcanzar una potencia especialmente alta. Tiene dos modelos de batería: una batería de 36V 12Ah y otra de 36V 17,5Ah, con las que la bicicleta puede alcanzar una autonomía de 45 a 80 km.\n\nTodo esto en tan solo 21 kg de peso con la batería incluida! Así que está ligera y muy práctica.\n\nCon sus frenos de disco hidráulico LOGAN F8000 160mm, uno delantero y otro trasero, te permitirás frenar con seguridad. Su cambio Shimano Tourney TZ 6 velocidades, te garantizará un cambio preciso y una velocidad de crucero fácil de alcanzar.\n\nDispone también de 5 niveles de asistencia para una conducción más cómoda. ",
                "categoria_id" => 2,
                "nombre" => "Bicicleta plegable Biwbik Traveller Platinum",
                "precio" => "1,224.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/bicicleta-electrica-plegable-book-sport-black-300x300.jpg",
                "descripcion" => "Esta bicicleta tiene un motor Brushless de 250W que lo permite alcanzar una potencia especialmente alta. Tiene dos modelos de batería: una batería de 36V 12Ah y otra de 36V 16Ah para que la bicicleta con las que la bicicleta puede alcanzar una autonomía de 45 a 80 km.\n\nTodo esto en tan solo 25 kg de peso con la batería incluida! Así que está ligera y muy práctica.\n\nEstá disponible en blanco, negro para que puedas elegir según tu gusto.\n\nCon sus frenos de disco hidráulico LOGAN F8000 160mm, uno delantero y otro trasero, te permitirás frenar con seguridad. Su cambio Shimano 6 velocidades, te garantizará un cambio preciso y una velocidad de crucero fácil de alcanzar. ",
                "categoria_id" => 2,
                "nombre" => "Biwbik Book Sport Black | White",
                "precio" => "1,024.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/bicicleta-electrica-valona-300x300.jpg",
                "descripcion" => "Disfruta al aire libre con este modelo Biwbik de la línea de bicicletas eléctricas de paseo. La comodidad del pedaleo asistido te permitirá hacer deporte y disfrutar de tus momentos de ocio, sin necesidad de realizar sobreesfuerzos.\n\nCon Valona tendrás una bicicleta eléctrica de gran calidad con el mejor precio del mercado.\n\nBatería y cargador incluidos\nComo todos los modelos Biwbik, dispone de la Certificación 15194, la normativa Europea que certifica la seguridad de las bicicletas con asistencia eléctrica.\n\n* El puño acelerador se entrega instalado si se compra junto a la bicicleta. ",
                "categoria_id" => 2,
                "nombre" => "Biwbik Valona",
                "precio" => "1,274.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/Gocycle-G4-blue-01_webstore-300x300.jpg",
                "descripcion" => "El galardonado Gocycle G4 establece un nuevo estándar de diseño ligero, innovación y rendimiento. El mejor compañero de viaje urbano.\n\nGuardabarros y luces ahora incluidos de serie.\n\nNuevo motor eléctrico G4drive™\nSuave y silencioso, el nuevo motor eléctrico G4drive™ a medida de Gocycle ofrece más par con un embalaje compacto líder en su clase.",
                "categoria_id" => 2,
                "nombre" => "Gocycle G4",
                "precio" => "3,964.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/Gocycle-G4-white-01_webstore-300x300.jpg",
                "descripcion" => "Cabina de piloto inspirada en la F1 a medida, cambio de marchas electrónico predictivo y luz de circulación diurna (DRL) patentada inspirada en la automoción\n\nGuardabarros y luces ahora incluidos de serie.\n\nNuevo motor eléctrico G4drive™\nSuave y silencioso, el nuevo motor eléctrico G4drive™ a medida de Gocycle ofrece más par con un embalaje compacto líder en su clase.",
                "categoria_id" => 2,
                "nombre" => "Gocycle G4i",
                "precio" => "5,162.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2022/06/Gocycle_G4i_Red_02_Webstore-300x300.jpg",
                "descripcion" => "Una edición exclusiva, el Gocycle G4i + con una variante ligera de carbono del récord mundial de velocidad de Gocycle PitstopWheels®.\n\nGuardabarros y luces ahora incluidos de serie.\n\nNuevo motor eléctrico G4drive™\nSuave y silencioso, el nuevo motor eléctrico G4drive™ a medida de Gocycle ofrece más par con un embalaje compacto líder en su clase.\n\nCuadro central de fibra\nde carbono\nEste componente central del chasis monocasco de G4i+ tiene el importante trabajo de conectar el bastidor delantero de aluminio hidroformado y el Cleandrive de magnesio patentado de Gocycle.",
                "categoria_id" => 2,
                "nombre" => "Gocycle G4i+",
                "precio" => "6,662.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/05/OZOa.235-300x300.jpg",
                "descripcion" => "La Inokim OZO es un medio de transporte ecológico con las cualidades de conducción de un scooter. Permite superar subidas empinadas y distancias considerables. Es una bicicleta que ofrece a los ciclistas una ayuda adicional de dinamismo en pendientes y desplazamientos largos.\n\nLa E-Bike está fabricada con aluminio ligero y duradero y está equipada con un motor sin engranajes fiable de 240W, con batería incorporada de iones de litio de 36V y 10,5 A\/h de fácil extracción para cuando quieras pedalear como una bicicleta normal. Sólo necesita 6 horas para cargarse por completo.",
                "categoria_id" => 2,
                "nombre" => "Inokim OZO",
                "precio" => "1,424.05€"

            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/04/khali-white1-300x300.jpg",
                "descripcion" => "El triciclo de Biwbik Khali Black | White es perfecto para viajes cortos en la ciudad por su comodidad, gracias a ser más estable y segura que bicicletas convencionales. Además, es una excelente opción para personas mayores o personas con diversidad funcional.\n\nEn la parte técnica, cuenta con un motor de 250W Brushless delantero acompañado de 6 velocidades. Así como un freno de disco hidráulico RUSH 160mm para poder frenar sin problema. Sostenido por la batería de litio de 12Ah o 16Ah que le dará una autonomía máxima de 70km.",
                "categoria_id" => 2,
                "nombre" => "Triciclo eléctrico Biwbik Khali Black | White",
                "precio" => "1,824.00€"
            ],
            [
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/04/paris-white1-300x300.jpg",
                "descripcion" => "El nuevo triciclo de Biwbik París Black | White es perfecto para viajes cortos en la ciudad por su comodidad, gracias a ser más estable y segura que bicicletas convencionales. Además, es una excelente opción para personas mayores o personas con diversidad funcional.\n\nEn la parte técnica, cuenta con un motor de 250W Brushless delantero acompañado de 6 velocidades. Así como un freno de disco hidráulico RUSH 160mm para poder frenar sin problema. Sostenido por la batería de litio de 12Ah o 16Ah que le dará una autonomía máxima de 70km.",
                "categoria_id" => 2,
                "nombre" => "Triciclo eléctrico Biwbik París Black | White",
                "precio" => "1,624.00€"
            ]
        ];

        foreach ($bicicletas as $item) {
            $stock = random_int(0, 50);
            ($stock > 0 && $stock <= 10) ? $stock = 0 : $stock;
            Producto::create([
                'nombre' => $item['nombre'],
                'descripcion' => $item['descripcion'],
                'imagen' => $this->obtenerImagenBici($item['imagen']),
                'precio' => (float) str_replace('€', '', str_replace(',', '', $item['precio'])), // Convertir precio a float
                'categoria_id' => $item['categoria_id'],
                'stock' => $stock,
            ]);
        }
    }
    public function obtenerImagenBici($url)
    {
        //Obtengo la imagen
        $imgContenido = file_get_contents($url);
        //Le doy un nombre unico
        $imgNombre = 'imgProduct/' . uniqid() . '.jpg';
        //Guardo la imagen en el storage
        Storage::put($imgNombre, $imgContenido);
        return $imgNombre;
    }
}
