# Tienda Two Wheels 🚴‍♂️🛒

![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue)
![Laravel](https://img.shields.io/badge/Laravel-8.x-red)
![Node.js](https://img.shields.io/badge/Node.js-14.x-green)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange)
[![Gmail](https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white)](mailto:twowheels.almeria@gmail.com)
![WhatsApp](https://img.shields.io/badge/WhatsApp-25D366?style=for-the-badge&logo=whatsapp&logoColor=white)

## 📃 Descripción

Tienda Two Wheels es una aplicación web creada con Laravel para gestionar una tienda de ventas de productos vmp. La aplicación incluye funcionalidades para manejar pedidos, productos, asi como el seguimiento de envíos. Además de poder enviar facturas por whatsapp al administrador y más cosas. La base principal de mi web es tambien transmitir que los VMP son transportes ecológicos y sostenibles. 
¡Espero que te guste! ❤️ 

## 🚀 Requisitos

- PHP 8.2 o superior
- Composer
- Node.js y NPM
- MySQL

## ⚙️ Instalación

1. Clona el repositorio:

   ```sh
   git clone https://github.com/tu-usuario/tienda_twoWheels.git
   cd tienda_twoWheels

2. Instala las dependencias de PHP:

   ```sh
   composer install
   composer update

3. Instala las dependencias de JavaScript:

   ```sh
   npm install
   npm run build

4. Copia el archivo .env.example a .env y configura los datos necesarios:

   ```sh
   cp .env.example .env

5. Ejecuta las migraciones y seeders:

   ```sh
   php artisan migrate --seed

## 🛠️ Comandos de Artisan

### Enviar Emails 📧
   Este comando envía las facturas en PDF por email a los clientes.
   1. Comando:
      ```sh
       php artisan command:enviar-mails

### Enviar Whatsapp 📲
   Este comando envía las facturas en PDF por whatsapp al administrador notificandole ademas del nuevo pedido.
   1. Comando:
      ```sh
       php artisan command:enviar-whatsapps

### Generar Tracking 🔄
   Este comando genera un nuevo registro en la APi de seguimiento.
   1. Comando:
      ```sh
       php artisan command:generate-tracking

### Actualizar Tracking 🔄
   Este comando actualiza el estado del pedido al siguiente en la APi de seguimiento.
   1. Comando:
      ```sh
       php artisan command:actualizar-tracking

### Enlaces útiles

- [Visita mi sitio web desplegado](http://twowheels.sytes.net)
- [Documentacion Whatsapp](https://developers.facebook.com/docs/whatsapp/cloud-api/reference/messages#template-object)
- [Documentacion Stripe](https://docs.stripe.com/)
- [Documentacion Paypal](https://www.paypal.com/ar/cshelp/article/%C2%BFqu%C3%A9-es-el-portal-para-desarrolladores-de-paypal-help453)


## 📜 Licencia

Este proyecto está licenciado bajo la licencia [Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)](https://creativecommons.org/licenses/by-nc-sa/4.0/deed.es).

En resumen, eres libre de:

- Compartir: copiar y redistribuir el material en cualquier medio o formato.
- Adaptar: remezclar, transformar y construir sobre el material.

Bajo las siguientes condiciones:

- Atribución: debes dar crédito adecuado, proporcionar un enlace a la licencia e indicar si se han realizado cambios. Puedes hacerlo de cualquier manera razonable, pero no de una manera que sugiera que el licenciante respalda tu uso.
- No Comercial: no puedes utilizar el material con fines comerciales.
- Compartir Igual: si remezclas, transformas o construyes sobre el material, debes distribuir tus contribuciones bajo la misma licencia que el original.

