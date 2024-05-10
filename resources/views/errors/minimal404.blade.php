<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        /* body {
            display: flex;
            justify-content: center;
            align-items: top;
            height: 100vh;
            background-color: #f0f0f0;
        }
 */
        .base {
            bottom: 10px;
        }

        .base>:first-child {
            width: 140px;
            height: 12px;
            background-color: #000;
            position: absolute;
            bottom: 65px;
            transform-origin: bottom center;
            border-radius: 5px;
            animation: animacionBase 4s ease-in-out infinite alternate;
        }

        .base>:last-child {
            position: absolute;
            width: 130px;
            height: 12px;
            background-color: #000;
            bottom: 112px;
            border-radius: 5px;
            transform-origin: bottom center;
            /* transform: translateY(-92px) translateX(120px) rotate(50deg); */
            animation: animacionUnionBaseMastil 4s ease-in-out infinite alternate;

        }

        .carretera {
            width: 550px;
            height: 5px;
            background-color: #000;
            position: absolute;
            bottom: 1px;
            transform-origin: bottom center;
            animation: carreteraExpand 2s ease-in-out infinite alternate;
        }

        .guardabarrosDelantero>:first-child {
            width: 60px;
            height: 10px;
            background-color: #000;
            position: absolute;
            bottom: 20px;
            transform-origin: bottom center;
            transform: translateY(-46px) translateX(163px);
            border-radius: 5px;
            z-index: 2;
        }

        .guardabarrosTrasero>:last-child {
            position: absolute;
            width: 90px;
            height: 40px;
            border: 10px solid #000;
            bottom: 20px;
            border-bottom: none;
            border-radius: 100% 0 0;
            transform: translateY(-60px) translateX(320px) rotate(-15deg);
            border-top-left-radius: 55px;
            border-top-right-radius: 55px;
        }

        .guardabarrosTrasero>:first-child {
            width: 60px;
            height: 10px;
            background-color: #000;
            position: absolute;
            bottom: 20px;
            transform-origin: bottom center;
            transform: translateY(-46px) translateX(330px);
            border-radius: 5px;
            z-index: 2;
        }

        .guardabarrosDelantero>:last-child {
            position: absolute;
            width: 90px;
            height: 40px;
            border: 10px solid #000;
            bottom: 20px;
            border-bottom: none;
            border-radius: 100% 0 0;
            transform: translateY(-60px) translateX(120px) rotate(15deg);
            border-top-left-radius: 55px;
            border-top-right-radius: 55px;
        }

        .mastil {
            width: 10px;
            height: 270px;
            background-color: #000;
            position: absolute;
            transform-origin: bottom center;
            animation: mastilRotateTranslate 4s linear infinite alternate;
            border-radius: 5px;
            z-index: 5;
        }

        .manillar>:first-child {
            width: 10px;
            height: 60px;
            background-color: #000;
            position: absolute;
            bottom: 20px;
            transform-origin: bottom center;
            transform: rotate(92deg) translateX(-250px) translateY(5px);
            border-radius: 5px;
            z-index: 1;
        }

        .manillar>:last-child {
            width: 10px;
            height: 60px;
            background-color: #000;
            position: absolute;
            bottom: 20px;
            transform-origin: bottom center;
            transform: rotate(92deg) translateX(-250px) translateY(70px);
            border-radius: 5px;
            z-index: 1;
        }

        .ruedaIzquierda {
            animation: animacionRuedaIzquierda 4s ease-in-out infinite alternate;
            z-index: 5;
        }

        .ruedaIzquierda>:nth-child(2) {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            position: absolute;
            bottom: 25px;
            background-color: white;
            border: 20px solid #000;
            left: 120px;
            transform-origin: center bottom;

        }

        .ruedaDerecha {
            animation: animacionRuedaDerecha 4s ease-in-out infinite alternate;
            z-index: 5;
        }

        .ruedaDerecha>:first-child {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            position: absolute;
            bottom: 25px;
            background-color: white;
            border: 20px solid #000;
            right: 120px;
            transform-origin: center bottom;
        }

        /* .scooter {
            width: 550px;
            height: 500px;
            position: relative;
            border-radius: 8px;
            padding: 50px;
        } */

        .spinner,
        .spinner2 {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-top: 4px solid #777777;
            border-radius: 50%;
            width: 65px;
            height: 65px;
            position: absolute;
            bottom: 35px;
            transform-origin: center;
            animation: spinRueda 4s linear infinite;
            z-index: 2;
        }

        .spinner {
            left: 128px;
        }

        .spinner2 {
            right: 128px;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            color: red;
            /* Color de texto rojo */
            font-family: Arial, sans-serif;
            /* Fuente para el texto */
            flex-direction: column;
            /* Alinear elementos verticalmente */
        }

        .scooter {
            width: 550px;
            height: 500px;
            position: relative;
            border-radius: 8px;
            padding: 50px;
            background-color: #ffffff;
            /* Color de fondo blanco para el scooter */
            margin-bottom: 20px;
            /* Espacio debajo del scooter */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .info-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .info-container>div {
            padding: 10px;
        }

        .info-container .code {
            border-right: 2px solid #ff0000;
            /* Borde derecho rojo */
        }

        .info-container .message {
            margin-left: 10px;
            /* Espacio a la izquierda */
        }

        @keyframes animacionRuedaIzquierda {

            0%,
            100% {

                transform: translateX(-50px)translateY(550px);
            }

            50% {
                transform: translateX(240px)translateY(550px);
            }
        }

        @keyframes animacionRuedaDerecha {

            0%,
            100% {
                transform: translateX(10px) translateY(550px);
            }

            50% {
                transform: translateX(-270px) translateY(550px);
            }
        }

        /* @keyframes animacionBase {
            0% {
                opacity: 1;
                transform: center scaleX(1);
            }

            20%,
            30% {
                opacity: 0;
                transform: scaleX(0.5);
            }

            35% {
                opacity: 0;
                transform: scaleX(1) rotateY(180deg) translateX(-250px);
            }

            40% {
                opacity: 0;
            }

            50% {
                opacity: 1;
                transform: center scaleX(1);
            }

            70%,
            80% {
                opacity: 0;
                transform: scaleX(0.5);
            }

            85% {
                opacity: 0;

            }

            90% {
                transform: scaleX(1) rotateY(0deg) translateX(0px);
            }

            100% {
                opacity: 1;
                transform: scaleX(1) center;

            }
        } */
        @keyframes animacionBase {

            0%,
            100% {
                left: 266px;
                transform: scaleX(1);
            }

            25% {
                left: 197px;
                transform: scaleX(0.2);
            }

            50% {
                transform: scaleX(1.25);
            }

            75% {
                left: 197px;
                transform: scaleX(0.2);
            }

            90% {
                left: 266px;
                transform: scaleX(1);
            }
        }

        @keyframes animacionUnionBaseMastil {
            0% {
                transform: rotate(50deg);
                left: 165px;
            }

            25% {
                left: 230px;
                transform: scaleX(0.3);
            }

            30% {
                left: 290px;
                transform: rotate(-50deg) scaleX(0.3);
            }

            45%,
            62% {
                left: 322px;
                transform: rotate(-50deg) scaleX(1);
            }

            70% {
                left: 290px;
                transform: scale(0.3);
            }

            71% {
                transform: scaleX(0);
            }

            75% {
                left: 230px;
                transform: scaleX(0) rotate(-50deg);

            }

            100% {
                transform: rotate(50deg) scaleX(1);
                left: 165px;

            }
        }

        @keyframes carreteraExpand {
            0% {
                transform: scaleX(1);
            }

            50% {
                transform: scaleX(0.2);
            }

            100% {
                transform: scaleX(1);
            }
        }

        @keyframes mastilRotateTranslate {

            0%,
            100% {

                bottom: 68px;
                left: 160px;
                transform: rotate(15deg) scaleY(1.414);
            }

            50% {
                bottom: 68px;
                right: 10px;
                transform: rotate(-15deg) scaleY(1.414);
            }

        }

        @keyframes spinRueda {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="scooter">

        <div class="ruedaIzquierda">
            <div class="mastil">
                <div class="manillar">
                    <span></span>
                    <span></span>
                </div>
            </div>

            <span></span>
            <span class="spinner"></span>
            <div class="guardabarrosDelantero">
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="base">
            <span></span>
            <span></span>
        </div>
        <div class="ruedaDerecha">
            <span></span>

            <span class="spinner2"></span>
            <div class="guardabarrosTrasero">
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="carretera"></div>
    </div>
    <div class="info-container">
        <div class="code text-lg text-gray-500 border-r border-gray-400 tracking-wider">
            @yield('code')
        </div>
        <div class="message ml-4 text-lg text-gray-500 uppercase tracking-wider">
            @yield('message')
        </div>
    </div>
</body>

</html>
