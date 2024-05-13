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
            transform: translateY(-60px) translateX(65px) rotate(-15deg);
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
            transform: translateY(-46px) translateX(75px);
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
            right: -175px;
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
            right: -168px;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            color: red;
            font-size: 50px;
            font-weight: bold;
            font-family: Arial, sans-serif;
            flex-direction: column;
        }

        .scooter {
            width: 550px;
            height: 500px;
            position: relative;
            border-radius: 8px;
            padding: 50px;
            background-color: transparent;
            /* Color de fondo blanco para el scooter */
            margin-bottom: 40px;
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
        }

        .info-container .message {
            margin-left: 10px;
        }

        .button {
            position: relative;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            padding-block: 0.5rem;
            padding-inline: 1.25rem;
            background-color: #072342;
            border-radius: 9999px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #ffff;
            gap: 10px;
            font-weight: bold;
            border: 3px solid #ffffff4d;
            outline: none;
            overflow: hidden;
            font-size: 15px;
            text-decoration: none;
        }

        .icon {
            width: 24px;
            height: 24px;
            transition: all 0.3s ease-in-out;
        }

        .button:hover {
            transform: scale(1.05);
            border-color: #fff9;
        }

        .button:hover .icon {
            transform: translate(4px);
        }

        .button:hover::before {
            animation: shine 1.5s ease-out infinite;
        }

        .button::before {
            content: "";
            position: absolute;
            width: 100px;
            height: 100%;
            background-image: linear-gradient(120deg,
                    rgba(255, 255, 255, 0) 30%,
                    rgba(255, 255, 255, 0.8),
                    rgba(255, 255, 255, 0) 70%);
            top: 0;
            left: -100px;
            opacity: 0.6;
        }
        /* Animacion boton volver a inicio */
        @keyframes shine {
            0% {
                left: -100px;
            }

            60% {
                left: 100%;
            }

            to {
                left: 100%;
            }
        }

        @keyframes animacionRuedaIzquierda {

            0%,
            100% {

                transform: translateX(-325px)translateY(550px);
            }

            50% {
                transform: translateX(-35px)translateY(550px);
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
        <div class="code">
            @yield('code')
        </div>
        <div class="message ">
            @yield('message')
        </div>
    </div>
    <a href="{{route('home')}}" class="button">
        Ir a Inicio
        <svg fill="currentColor" viewBox="0 0 24 24" class="icon">
            <path clip-rule="evenodd"
                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
                fill-rule="evenodd"></path>
        </svg>
    </a>

</body>

</html>
