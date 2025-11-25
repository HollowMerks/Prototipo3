<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenido/a a Campus Market</title>
</head>
<body>
    <p>Hola {{ $user->name }},</p>

    <p>Bienvenido/a a Campus Market — La Paz.</p>

    <p>Hemos creado una cuenta para ti con las siguientes credenciales temporales:</p>

    <ul>
        <li>Email: {{ $user->email }}</li>
        <li>Contraseña temporal: <strong>{{ $password }}</strong></li>
    </ul>

    <p>Puedes iniciar sesión y cambiar tu contraseña en cualquier momento desde tu perfil. Si prefieres, puedes dejar esta contraseña tal cual.</p>

    <p>¡Bienvenido/a y que disfrutes Campus Market!</p>

    <p>Saludos,<br>Equipo Campus Market — La Paz</p>
</body>
</html>
