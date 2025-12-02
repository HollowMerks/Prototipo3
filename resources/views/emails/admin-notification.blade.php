<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
        }
        .content {
            padding: 20px 0;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #666;
        }
        .icon {
            font-size: 24px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $titulo }}</h1>
    </div>

    <div class="content">
        <p>{{ $mensaje }}</p>

        @if($imagenBase64 && $mimeType)
            <!-- Usar base64 inline como fallback principal -->
            <div style="text-align: center; margin: 20px 0;">
                <img src="data:{{ $mimeType }};base64,{{ $imagenBase64 }}"
                     alt="Imagen de notificación"
                     style="max-width: 100%; height: auto; border-radius: 5px; display: block; margin: 0 auto;">
            </div>
        @endif
    </div>

    <div class="footer">
        <p>Esta es una notificación automática del sistema Campus Market.</p>
        <p>Si tienes alguna pregunta, por favor contacta al administrador.</p>
    </div>
</body>
</html>
