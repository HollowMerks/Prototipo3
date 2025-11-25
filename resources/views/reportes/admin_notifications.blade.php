<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Notificaciones Administrativas</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f4f4f4; }
    </style>
</head>
<body>
    <h1>📨 Reporte de Notificaciones Administrativas</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Título</th>
                <th>Mensaje</th>
                <th>Estado</th>
                <th>Fecha de Envío</th>
            </tr>
        </thead>
        <tbody>
        @foreach($notificaciones as $n)
            <tr>
                <td>{{ $n->ID_Notificacion }}</td>
                <td>{{ $n->usuario->user->name ?? '' }}</td>
                <td>{{ $n->Titulo_Notificacion }}</td>
                <td>{{ $n->Mensaje_Notificacion }}</td>
                <td>{{ $n->Estado_Notificacion }}</td>
                <td>{{ optional($n->Fecha_Envio)->format('d/m/Y H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
