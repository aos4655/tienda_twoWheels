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
                'imagen' => $this->obtenerImagen($item['imagen']),
                'precio' => (float) str_replace('€', '', str_replace(',', '', $item['precio'])), // Convertir precio a float
                'categoria_id' => $item['categoria_id'],
                'stock' => $stock,
            ]);
        }

        $accesorios = [
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/05/candado-con-combinacion-de-5-digitos-300x300.jpg",
                "nombre" => "Candado con combinación de 5 dígitos",
                "precio" => "19.99€",
                "descripcion" => "El candado con combinación de 5 dígitos es la solución perfecta para mantener tus pertenencias seguras en cualquier lugar. Con su combinación personalizable de 5 dígitos, puedes estar seguro de que solo tú o las personas autorizadas tendrán acceso a tus objetos. Con su diseño duradero y fácil de usar, el candado con combinación de 5 dígitos es un accesorio imprescindible para mantener tus objetos de valor seguros mientras estás en movimiento."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/12/CANDADO-MODELO-5_3-info-300x300.jpg",
                "nombre" => "Candado Plegable Ewheel",
                "precio" => "34.95€",
                "descripcion" => "Candado plegable para patinete eléctrico o bicicleta\nFabricado en acero inoxidable, resistente a cizalla hidráulica de corte de hasta 12 toneladas."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/12/CANDADO-U-LOCK_1-info-300x300.jpg",
                "nombre" => "Candado U Zwheel",
                "precio" => "14.95€",
                "descripcion" => "Candado para patinete eléctrico o bicicleta.\nIncluye un soporte para bicicletas y otro para patinetes."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/11/tempsnip3-300x300.png",
                "nombre" => "Casco con luz led",
                "precio" => "39.95€",
                "descripcion" => "Casco para bicicleta o patinete con luz led de 3 posiciones recargable a través de USB. Ideal para dar una mayor visibilidad en tus trayectos."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2022/04/casco-patinete-electrico-xiaomi-blanco-300x300.jpg",
                "nombre" => "Casco para patinete eléctrico",
                "precio" => "24.95€",
                "descripcion" => "Homologado bajo Normativa EN 1078: 2012 “Cascos para ciclistas y para usuarios de patinetes y monopatines”."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/smart4u-sh50-cycling-bicycle-helmet-smart-300x300.jpg",
                "nombre" => "Casco SMART4U",
                "precio" => "59.90€",
                "descripcion" => "Está equipado con una luz LED de advertencia automática para que pueda ser visible por otros. Tiene 12 orificios para facilitar la circulación del aire en la cabeza. Funciona con una batería recargable de 3,7V 455mAh que permite recorrer una autonomía de hasta 36 horas y tiene 3 modos de iluminación diferentes."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/03/copy-of-casco-smartgyro-smart-helmet-l-white-300x300.jpg",
                "nombre" => "Casco Smartgyro Smart Helmet",
                "precio" => "69.00€",
                "descripcion" => "Casco inteligente, cómodo y ergonómico que incorpora luces Leds delanteras / traseras que podrás accionar desde su botón trasero."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2022/09/casco-smartgyro-smart-helmet-max-l-black-300x300.jpg",
                "nombre" => "Casco SmartGyro Smart Helmet MAX",
                "precio" => "79.00€",
                "descripcion" => "Casco inteligente, seguro y cómodo con funciones avanzadas de seguridad y ergonomía."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/03/casco-smartgyro-smart-helmet-pro-m-black-300x300.jpg",
                "nombre" => "Casco SmartGyro Smart Helmet PRO",
                "precio" => "99.00€",
                "descripcion" => "Casco inteligente, seguro y cómodo con funciones avanzadas de seguridad y ergonomía."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2022/04/chaleco-reflectante-2-300x300.jpg",
                "nombre" => "Chaleco reflectante",
                "precio" => "9.95€",
                "descripcion" => "Chaleco reflectante con bolsillos de alta visibilidad, homologado según las normativas de seguridad CE."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/05/inflador-portatil-smart-air-pump-300x300.jpg",
                "nombre" => "Compresor portátil Smart Air pump",
                "precio" => "49.99€",
                "descripcion" => "El compresor portátil Smart Air Pump es un accesorio compacto y fácil de llevar, que te permite inflar neumáticos de bicicletas, pelotas y colchones de aire en cualquier lugar.\nCon su batería de larga duración y pantalla LED hacen que sea fácil de usar. El Smart Air Pump es el compañero perfecto para tus aventuras al aire libre."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/05/espejor-retrovisor-para-manillar-300x300.jpg",
                "nombre" => "Espejo retrovisor para manillar de SmartGyro Raptor",
                "precio" => "9.99€",
                "descripcion" => "Espejo retrovisor diseñado para el manillar del SmartGyro Raptor, proporcionando una visibilidad adicional para una conducción más segura."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/05/rr-300x300.jpg",
                "nombre" => "Espejo retrovisor para puño",
                "precio" => "9.99€",
                "descripcion" => "Espejo retrovisor compacto diseñado para el puño de bicicletas o patinetes, ofreciendo una visión trasera conveniente para el usuario."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/05/biwbik-front-bag-removebg-preview-2-300x300.png",
                "nombre" => "Bolsa frontal Biwbik",
                "precio" => "45.00€",
                "descripcion" => "Bolsa de lona con correa de transporte y sistema de fijación en el manillar, ideal para llevar objetos esenciales durante los viajes en bicicleta o patinete."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/05/funda-display-silicona-speedway-y-rockway-300x300.jpg",
                "nombre" => "Funda de silicona para display Speedway y Rockway",
                "precio" => "19.00€",
                "descripcion" => "Funda protectora de silicona diseñada para el display S866, ofreciendo protección contra golpes y arañazos."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/06/INFLADOR-1-1-300x300.jpg",
                "nombre" => "Inflador eléctrico portátil",
                "precio" => "39.95€",
                "descripcion" => "Inflador eléctrico portátil con puerto USB para cargar dispositivos, luz LED blanca continua y luz roja intermitente para usos de emergencia."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/03/707914-300x300.jpg",
                "nombre" => "Líquido Sellante Muc-Off para Cámaras 300 ml",
                "precio" => "19.95€",
                "descripcion" => "Sellante para cámaras con fórmula patentada a base de agua que sella agujeros de hasta 4 mm, asegurando un viaje sin interrupciones."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/Etwow.org-Manillar-300x300-1.jpg",
                "nombre" => "Manillar de niños para E-twow",
                "precio" => "25.00€",
                "descripcion" => "Manillar adicional diseñado para llevar a los niños como segundo pasajero en patinetes E-twow."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2023/05/mini-bomba-manual-300x300.jpg",
                "nombre" => "Mini bomba manual SmartGyro",
                "precio" => "14.99€",
                "descripcion" => "Mini bomba de aire ligera y resistente, fabricada en aluminio para patinetes eléctricos o bicicletas."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/05/biwbik-saddlebag-removebg-preview-300x300.png",
                "nombre" => "Alforjas Biwbik",
                "precio" => "45.00€",
                "descripcion" => "Alforjas de poliéster diseñadas para fijarse en el portaequipajes trasero de bicicletas, proporcionando espacio adicional para llevar objetos durante los viajes."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2022/04/soporte-movil-patinete-xiaomi-m365-pro-scaled-1-300x300.jpg",
                "nombre" => "Soporte G85",
                "precio" => "14.90€",
                "descripcion" => "Soporte para móvil en aluminio ajustable, diseñado para instalarse en el manillar de bicicletas, patinetes o motos."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/predni-odpruzeni-monorim-v2-pro-xiaomi-scooter-cerna-300x300.jpg",
                "nombre" => "Suspensión Monorim V2",
                "precio" => "69.95€",
                "descripcion" => "Suspensión Monorim compatible con Xiaomi M365 y Xiaomi PRO, con muelle regulable según el peso del usuario."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/61QAcZUltL._AC_SL1001_-300x300.jpg",
                "nombre" => "Tira LED para patinete eléctrico",
                "precio" => "17.95€",
                "descripcion" => "Pack de 2 tiras LED laterales para Xiaomi Mi Electric Scooter, proporcionando visibilidad adicional y personalización."
            ],
            [
                "categoria_id" => 3,
                "imagen" => "https://ridenroll.es/wp-content/uploads/2021/04/Captura-de-pantalla-2020-10-22-a-las-13.07.48-300x300.png",
                "nombre" => "Vinilos Xiaomi M365 / Pro",
                "precio" => "29.95€",
                "descripcion" => "Vinilo Xiaomi M365 el mejor accesorio Xiaomi m365 para personalizar tu Xiaomi m365,patinete electrico, haz único tu patinete eléctrico con nuestras pegatinas alto agarre valido para todos los modelos Xiaomi m365, Xiaomi m365 Pro, impresión de alta calidad y durabilidad especial para exteriores, con un laminado satinado extra para protegerlo de posibles pequeños arañazos.Vinilo Xiaomi m365,Valido Xiaomi m365 pro 2 ,Pegatinas para Patinete Xiaomi m365,xiaomi m365 Sticker,pegatinas para patinete xiaomi m365",
            ]
        ];
        foreach ($accesorios as $item) {
            $stock = random_int(0, 50);
            ($stock > 0 && $stock <= 10) ? $stock = 0 : $stock;
            Producto::create([
                'nombre' => $item['nombre'],
                'descripcion' => $item['descripcion'],
                'imagen' => $this->obtenerImagen($item['imagen']),
                'precio' => (float) str_replace('€', '', $item['precio']), // Convertir precio a float
                'categoria_id' => $item['categoria_id'],
                'stock' => $stock,
            ]);
        }
        $patinetes = [
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2024/04/2trottinette-electrique-bluetran-lightning-72v-35ah-lg-300x300.jpg",
             "nombre"=> "Bluetran Lightning 72V",
             "precio"=> "1,299.00€",
             "descripcion"=> "Bluetran Lightning de Minimotors, el nuevo miembro de la familia acaba de llegar para revolucionar la gama de 72V con un increíble patinete eléctrico. Minimotors se ha superado una vez más con un nuevo concepto de ultrapotencia, calidad y diseño innovador en tamaño contenido y precio ajustado. Sus 5040W de pico máximo están alimentados por una batería de 72V 35ah LG (próximamente 26Ah y 32Ah), impulsando al patinete hasta los 80-90km\/h (limitado de fábrica a 25 km\/h con certificado de importador) y una autonomía máxima de 150km. Su diseño deportivo y compacto enamora a primera vista y resulta muy práctico en el día a día."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/11/dualtron-achilleus-300x300.jpg",
             "nombre"=> "Dualtron Achilleus",
             "precio"=> "2,989.00€",
             "descripcion"=> "Dualtron Achilleus, la nueva “máquina” de Dualtron que llega para sustituir el legendario Dualtron Thunder con mejoras muy interesantes. El nuevo Dualtron Achilleus hereda todas las ventajas del Thunder pero con un diseño mas compacto y ligero. Su increíble potencia máxima de 4648W es alimentada por una batería de litio 60V 35Ah (LG 21700), impulsándolo hasta los 80km\/h (limitado a 25km\/h con certificado de importador) y 120km de autonomía máxima. El Dualtron Achilleus incorpora un nuevo diseño de base mas estrecho y 3kg menos, además de incorporar un asa de agarre y apoyo de pie trasero, lo que lo convierten en un patinete mas manejable y práctico. Y como no, los frenos hidráulicos y las ruedas tubeless de 11″ confieren al patinete una seguridad  increíbles. ¡Ha nacido una nueva leyenda!"
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/04/Blade-x-transparent-300x300.png",
             "nombre"=> "Dualtron Blade X v2023",
             "precio"=> "1,990.00€",
             "descripcion"=> "Dualtron Blade X o Teverun Blade X, Minimotors se reinventa y nos sorprende con un alucinante patinete eléctrico que va a revolucionar el sector. Un nuevo concepto de vehículo que se rediseña desde 0 para los usuarios más exigentes. Sus increíbles 4000W de pico máximo están alimentados por una batería de litio 60V 24Ah o 30Ah LG, impulsando al patinete hasta los 80km\/h de velocidad máxima (limitado a 25km\/h con certificado). Como novedades el Blade X destaca su gran suspensión hidráulica ultracómoda y estable, intermitentes de gran tamaño, nuevos LED supervisibles, nuevo sistema de plegado, deck de goma, frenos hidráulicos… Dualtron Blade X es pura diversión, diseño y calidad."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2022/05/Dualtron-City-Big-Wheels-Electric-Scooter-New-Generation-1-300x300.jpeg",
             "nombre"=> "Dualtron City",
             "precio"=> "2,089.00€",
             "descripcion"=> "Dualtron City, el nuevo concepto de movilidad de Minimotors. La marca asiática se reinventa con un nuevo modelo de patinete que no deja indiferente por sus ruedas extragrandes de 15″, cuyo objetivo es mejorar exponencialmente la comodidad, estabilidad y seguridad de conducción. Las prestaciones del Dualtron City no se queda atrás, ya que gracias a sus 4000W de pico máximo y su batería de 60V 25Ah LG extraible es capaz de alcanzar los 70km\/h (limitado a 25km\/h con certificado) y los 80km de autonomía máxima."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/11/dualtron-mini-1-300x300.jpg",
             "nombre"=> "Dualtron Mini Dual Brake",
             "precio"=> "1,125.00€",
             "descripcion"=> "Autonomía=> 55-65km (21Ah) \/ 50-55km (17Ah) o 35-40km (13Ah)\n\nVelocidad máxima=> 55 Km\/h (Limitado a 25 Km\/h, Delimitado a 55 Km\/h por uso privado)"
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/03/dualtron-mini-special-300x300.jpg",
             "nombre"=> "Dualtron Mini Special 52V 12.8Ah LG | 13Ah | 17.5Ah | 21Ah LG",
             "precio"=> "965.00€",
             "descripcion"=> "El Dualtron Mini Special supone un punto de inflexión de diseño en los patinetes eléctricos Dualtron. La marca inicia una nueva era con un espectacular diseño ultramoderno y de altísima calidad. Un nuevo estilo que rompe con la estética habitual de los Dualtron pero manteniendo el espíritu diferenciador de la marca. Un diseño que enamora desde el primero momento gracias también a sus luces led en deck y manillar para ser visto en las situaciones con menor visibilidad. La nuevo versión Special además incorpora manillar con puños plegables"
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/04/Dualtron-Mini-Special-LongBody-300x300.webp",
             "nombre"=> "Dualtron Mini Special Dual",
             "precio"=> "1,069.00€",
             "descripcion"=> "Dualtron Mini Special Dual Long Body, el patinete más esperado de Minimotors y que sus fieles seguidores estaban reclamando desde hace tiempo. Minimotors nos sorprende con un nuevo e increible Dualtron Mini Special Dual mejorado al limite destacando su doble motor para obtener una potencia dual impresionante, que te permitirá subir cualquier tipo de cuesta si esfuerzo. Posiblemente se convierta en el mejor patinete dual compacto del 2023. "
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/06/Dualtron-Popular-scaled-1-scaled-1-300x300.jpg",
             "nombre"=> "Dualtron Popular",
             "precio"=> "879.00€",
             "descripcion"=> "Dualtron Popular, el nuevo modelo de Minimotors que reinventa el concepto de la movilidad urbana con un patinete eléctrico sorprendente por su diseño ultramoderno premium y grandes prestaciones con caracter urbano. Dualtron Popular incorpora un chasis novedoso de gran resistencia, doble suspensión y nuevo display integrado de gran tamaño. Disponible en versiones de 1 motor de 450W o 2x450W  además de 3 opciones de baterías de litio de 52V 14Ah, 20Ah y 25Ah LG, consiguiendo unas grandes prestaciones de hasta 65km\/h (limitado de fábrica a 25km\/h con certificado) y hasta 80km de autonomía máxima. Tecnología, diseño y potencia para mantener el liderato del mercado y satisfacer las necesidades de los riders más exigentes."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2021/04/patinete-electrico-dualtron-raptor-ii-300x300.jpg",
             "nombre"=> "Dualtron Raptor 2",
             "precio"=> "1,490.00€",
             "descripcion"=> "Dualtron Raptor 2 S ahora con nuevo display EYE 3, es uno de los patinetes eléctricos mas ligeros de Dualtron, con tan solo 24,5kg. Compacto, superpotente y con excelente autonomía. Con sus 3000W de pico máximo y su batería de 60v 18Ah alcanza los 60km\/h (limitado a 25km\/h con certificado de importador) y hasta 60km de autonomía. Además incorpora ruedas solidas, por lo que te olvidarás de los pinchazos."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2022/04/Spider-2-aa-300x300.jpg",
             "nombre"=> "Dualtron Spider II",
             "precio"=> "1,719.00€",
             "descripcion"=> "Dualtron Spider II, la evolución del poderoso y legendario Spider. destacamos su potencia total de 3984W gracias a su Motor Dual, con esto podrá llegar a una velocidad máxima de hasta 70km\/h (limitado de fábrica a 25km\/h)."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/04/dt-spider-max-1-300x300.jpg",
             "nombre"=> "Dualtron Spider Max EY4",
             "precio"=> "2,449.00€",
             "descripcion"=> "Dualtron Spider Max, el nuevo modelo de Minimotors nos sorprende gratamente por sus espectaculares mejoras que lo convierten en unos de los mejores patinetes del 2023. La nueva “araña” de mantiene su espíritu de patinete portable de 31,5kg pero incrementando en prestaciones y tecnología, siendo un patinete realmente versátil ultrapotente para el uso por ciudad y largas rutas. Su nuevo display EYE 4 además mejora totalmente la experiencia de conducción. Dualtron Spider Max es el patinete perfecto para los riders exigentes que busque calidad y potencia si sacrificar versatilidad."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2022/04/DT-Storm-EY4-72V-300x300.jpg",
             "nombre"=> "Dualtron Storm Limited EY4 v2024",
             "precio"=> "5,049.00€",
             "descripcion"=> "Dualtron Storm Limited, el nuevo patinete eléctrico de Dualtron. Llega con una potencia tan solo disponible en los patinetes eléctricos de alta gama, gracias a su potencia total de 11500w. Con esto logrará una velocidad máxima de hasta 115 km\/h (limitado de fábrica a 25km\/h). En terminos de autonomía, este patinete Dualtron Storm Limited será capaz de recorrer hasta 200 kilometros con una sola carga gracias a su batería de 84V 45Ah LG 27700. Nos encontramos ante un patinete que practicamente no tiene rival"
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/04/Dualtron-ThunderIII-300x300.jpg",
             "nombre"=> "Dualtron Thunder III 72V 40Ah LG",
             "precio"=> "4,990.00€",
             "descripcion"=> "Dualtron Thunder III, un patinete eléctrico que ha marcado un antes y un después en el mundo de los patinetes eléctricos de alta gama. Gracias a su descomunal motor dual de 11000 y su batería LG de 72V 40Ah conseguirás la escalofriante velocidad máxima de 100km\/h (limitado a 25km\/h) y una autonomía de hasta 170 km, dependiendo del modo de conducción."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/11/dt-togo-1-300x300.jpg",
             "nombre"=> "Dualtron Togo",
             "precio"=> "629.00€",
             "descripcion"=> "Nuevo Dualtron Togo, Minimotors nos presenta su última novedad que llega para apoderarse de la ciudad y convertirse en un auténtico top ventas por su increíble diseño, calidad, potencia y gran precio. Se trata el patinete Dualtron más económico y compacto del mercado sin renunciar a su filosofía, con el objetivo de satisfacer las necesidades de los riders mas urbanos. Destaca su diseño, agilidad y acabados que nos recuerda al Dualtron Mini. Sus suspensiones de aire regulable y estructura resistente te permitirá realizar viajes muy cómodos y seguros. "
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2024/04/Dualtron-Togo-Homologado-DGT-3-300x300.jpg",
             "nombre"=> "Dualtron Togo (Homologado DGT)",
             "precio"=> "699.00€",
             "descripcion"=> "Dualtron Togo Certificado por la DGT, el nuevo modelo de Minimotors llega para apoderarse de la ciudad y convertirse en un auténtico top ventas por su increible diseño, calidad, potencia y gran precio. Se trata el patinete Dualtron más económico y compacto del mercado sin renunciar a su filosofía, con el objetivo de satisfacer las necesidades de los riders mas urbanos. Destaca su diseño, agilidad y acabados que nos recuerda al Dualtron Mini. Sus suspensiones de aire regulable y estructura resistente te permitirá realizar viajes muy cómodos y seguros. "
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2022/04/DUALTRON-VICTOR3-scaled-1-300x300.jpg",
             "nombre"=> "Dualtron Victor",
             "precio"=> "1,559.00€",
             "descripcion"=> "Dualtron Victor con nuevo display EYE 3 y APP, el nuevo patinete eléctrico de Minimotors que llega para mantener el liderato en la gama Premium. El Dualtron Victor es una evolución del Dualtron 3 con mejoras muy interesantes. La primera de ellas es su potencia máxima de 4000W, que impulsa al patinete hasta los 80km\/h (limitado a 25km\/h con certificado), un incremento notable que se dejará notar. Otras mejoras son los frenos hidráulicos y el nuevo sistema de plegado reforzado doble. "
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/03/dualtron-victor-luxury-electric-scooter-300x300.jpg",
             "nombre"=> "Dualtron Victor Luxury",
             "precio"=> "1,749.00€",
             "descripcion"=> "El diseño de este modelo es similar al del Dualtron 3, los Dualtron Victor lucen con orgullo un color negro general asociado con las líneas coloridas que representan la marca. También podemos notar algunos patrones y letras de color blanco en ambos lados. El Dualtron Victor está rodeado por un marco de aluminio 6082 T6 y esta armadura le asegura una resistencia a cualquier prueba."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2022/04/Dualtron-victor-luxury-plus-1-300x300.jpg",
             "nombre"=> "Dualtron Victor Luxury Plus",
             "precio"=> "2,099.00€",
             "descripcion"=> "Dualtron Victor Luxury Plus es un Victor Luxury redimensionado que ofrece más espacio en la cubierta para el conductor y se adapta mejor a nuestros clientes más altos.\nElevamos la longitud del e-scooter en 60 mm adicionales y extendimos la plataforma en 60 mm adicionales.\nEl Dualtron Victor Luxury Plus tiene todo lo que hizo que el modelo Victor fuera un éxito pero, además, todo lo que le faltaba y lo hacía “imperfecto”.\n¡Además, el Dualtron Victor Luxury Plus tiene aún más alcance que los otros modelos Victor con sus potentes baterías CN 60V28Ah o LG 21700 60V35Ah!\nPerfil de los usuarios de Victor Luxury Plus=> usuarios que buscan un scooter eléctrico de alta calidad \/ alto rendimiento \/ alta gama diseñado principalmente para la ciudad."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/04/dualtron-x-limited1-300x300.jpeg",
             "nombre"=> "Dualtron X Limited 84V 60Ah LG EY4",
             "precio"=> "9,239.00€",
             "descripcion"=> "El Dualtron X Limited es el modelo más exclusivo y de gama alta de la marca Dualtron, hecho para los que quieran el top de prestaciones y busquen el máximo rendimiento para todo tipo de terrenos.\n\nDiseñado a partir del modelo X2, su fortaleza reside en su tamaño más grande que es perfecto para las necesidades de nuestros clientes más avanzados, mejorando la estabilidad a velocidades más altas."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2021/04/booster-plus-s-new-black-scaled-1-300x300.jpg",
             "nombre"=> "E-TWOW Booster ES",
             "precio"=> "799.00€",
             "descripcion"=> "El patinete eléctrico Booster ES tiene un motor DC Brushless 500W que puede alcanzar una velocidad de hasta 38 km\/h.\n\nCon una batería de 36V – 7,8 Ah, el patinete puede recorrer 25-30 km con una carga.\n\nAdemás, el tamaño de las ruedas se ha incrementado a 8,5 pulgadas para mayor agarre y seguridad. Para una conducción perfecta, hay una suspensión delantera y trasera para una mejor estabilidad. Con tanta potencia es necesario un sistema de frenado eficaz, por esta razón el patinete eléctrico está dotado de un freno regenerativo en la rueda delantera y freno trasero tambor, para frenados precisos en toda seguridad."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2021/04/booster-plus-s-new-white-scaled-1-300x300.jpg",
             "nombre"=> "E-twow Booster V",
             "precio"=> "899.00€",
             "descripcion"=> "El patinete eléctrico Booster V tiene un motor DC Brushless 500W que lo permite alcanzar una velocidad de 40 km\/h.\n\nCon una batería de 36V – 10.5 Ah, el patinete puede recorrer una autonomía de hasta 30-35 km con una carga."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/05/Patinets-Dual-GT-300x300.jpg",
             "nombre"=> "E-TWOW Dual-GT10 Versión SE (Smart Edition)",
             "precio"=> "1,699.00€",
             "descripcion"=> "2 motores x 500w de potencia nominales\n\nBatería 48v 10,5Ah\n\nPeso=> 15 Kg"
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2023/05/Patinets-Dual-GT-300x300.jpg",
             "nombre"=> "E-TWOW Dual-GT15 Versión SE (Smart Edition)",
             "precio"=> "1,949.00€",
             "descripcion"=> "2 motores x 700W de potencia\n\nBatería 48v 15 Ah\n\nPeso=> 15 Kg"
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2021/04/gtse-gri3-300x300.jpg",
             "nombre"=> "E-twow GT SE (Smart Edition)",
             "precio"=> "1,190.00€",
             "descripcion"=> "El patinete eléctrico Booster GT Smart Edition 2020 tiene un motor Brushless DC de 700W que le permitirá alcanzar una velocidad máxima de 40 km\/h.\n\nCon una batería de Litio-Ion 48v 10,5Ah, este patinete puede recorrer una autonomía máxima entre 35 y 45 km."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2022/04/NewGT_SL_etwow.es_Black-1-1536x1385-1-300x300.jpg",
             "nombre"=> "E-twow GT SL (Smart Edition)",
             "precio"=> "899.00€",
             "descripcion"=> "Te presentamos el nuevo patinete eléctrico E-TWOW GT SL Smart Edition. Tiene una batería de 48V 7,8Ah de Li-ion que nos proporciona un gran par y una autonomía de 35 km, gracias a ofrecer una potencia de 700W.\n\nEste modelo incluye tecnología Bluetooth con bloqueo de seguridad."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2022/04/Oficial_GT_SPORT_Etwow.es_White-scaled-1-300x300.jpg",
             "nombre"=> "E-twow GT Sport",
             "precio"=> "1,149.00€",
             "descripcion"=> "Te presentamos la variante deportiva de la gama GT de la conocida marca de patinetes eléctricos E-TWOW. Esta variante ahora ofrece picos de potencia de hasta 1000W en comparación de los 700W de su gama Smart Edition.\n\nTiene una batería de 48V 7,8Ah que te permiten alcanzar velocidades de más de 40 km\/h con un gran par de potencia. Su autonomía es de 30-35 km."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2022/04/NewGT_SE_etwow.es_Black-1-scaled-1-300x300.jpg",
             "nombre"=> "E-TWOW GT15 SE (Smart Edition)",
             "precio"=> "1,399.00€",
             "descripcion"=> "Te presentamos la gama alta de la linea GT de la marca E-TWOW. Esta vez llega con un importante cambio, una nueva batería de 48V 15Ah que nos ofrece una autonomía de 50 – 55 km manteniendo los 700 W de potencia.\n\nIncluye tecnología Bluetooth con sistema de seguridad."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2022/04/Oficial_GT_SPORT_Etwow.es_Grey-scaled-1-300x300.jpg",
             "nombre"=> "E-TWOW GT15 Sport",
             "precio"=> "1,490.00€",
             "descripcion"=> "Te presentamos la gama alta de la linea GT de la marca E-TWOW. Esta vez con la variante GT 15 SPORT con una nueva batería de 48V 15Ah Samsung que nos ofrece una autonomía de 35 – 45 km que nos ofrece una potencia pico de 1000W (700W Nominal).\n\nIncluye tecnología Bluetooth con sistema de seguridad."
            ],
            [
             "categoria_id"=> 1,
             "imagen"=> "https://ridenroll.es/wp-content/uploads/2022/06/ice-m5-48v-15ah-dual-motor-1000w-300x300.jpg",
             "nombre"=> "ICe M5",
             "precio"=> "1,099.00€",
             "descripcion"=> "El patinete eléctrico ICe M5 dispone de Certificado VMP, de acuerdo con el manual de características VMP publicado mediante Resolución de 12 de enero de 2022, de la Dirección General de Tráfico.\n\nEl ICe M5 que incorpora 2 potentes motores de 500W cada uno y una batería de 48V y 15.8Ah hace realidad el objetivo de un patinete resistente, a la vez que compacto, potente y controlable así como grande pero ligero."
            ]
            ];
            foreach ($patinetes as $item) {
                $stock = random_int(0, 50);
                ($stock > 0 && $stock <= 10) ? $stock = 0 : $stock;
                Producto::create([
                    'nombre' => $item['nombre'],
                    'descripcion' => $item['descripcion'],
                    'imagen' => $this->obtenerImagen($item['imagen']),
                    'precio' => (float) str_replace('€', '', str_replace(',', '', $item['precio'])), // Convertir precio a float
                    'categoria_id' => $item['categoria_id'],
                    'stock' => $stock,
                ]);
            }
    }

    public function obtenerImagen($url)
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
