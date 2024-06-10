<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje de Usuario</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f0fdf4;">
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <tr style="background-color: #10b981;">
            <td style="padding: 16px 24px; text-align: center; color: #ffffff;">
                <h1 style="margin: 0; font-size: 24px; line-height: 32px;">Nuevo Mensaje de Contacto</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 24px;">
                <p style="margin: 0 0 16px; color: #4b5563;">Has recibido un nuevo mensaje de contacto desde tu sitio web de patinetes.</p>
                <p style="margin: 0 0 8px; color: #4b5563;"><strong>Nombre:</strong> {{ $nombre }}</p>
                <p style="margin: 0 0 8px; color: #4b5563;"><strong>Email:</strong> {{ $email }}</p>
                <p style="margin: 0 0 16px; color: #4b5563;"><strong>Mensaje:</strong></p>
                <div style="padding: 16px; background-color: #f0fdf4; border-radius: 8px; color: #374151;">
                    {{ $contenido }}
                </div>
            </td>
        </tr>
        <tr style="background-color: #d1fae5;">
            <td style="padding: 16px 24px; text-align: center; color: #065f46;">
                <p style="margin: 0; font-size: 14px;">&copy; 2024 Two Wheels. Todos los derechos reservados.</p>
            </td>
        </tr>
    </table>
</body>
</html>
