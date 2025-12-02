<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte Categorías Artículos</title>
    <style>
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #ddd; padding:8px; }
        th { background:#f4f4f4; }
    </style>
</head>
<body>
    <h2>Reporte de Categorías de Artículos</h2>
    <table>
        <thead>
            <tr>
                <th>Cod</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Carrera</th>
                <th>Creado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $c)
                <tr>
                    <td>{{ $c->Cod_Categoria }}</td>
                    <td>{{ $c->Nombre_Categoria }}</td>
                    <td>{{ $c->Descripcion_Categoria }}</td>
                    <td>{{ $c->carrera->Nombre_Carrera ?? '' }}</td>
                    <td>{{ optional($c->created_at)->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
