<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Usuarios</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #555; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; }
    </style>
</head>
<body>
    <h1>Reporte de Usuarios Campus Market</h1>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Carrera</th>
                <th>Universidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td style="width:80px; text-align:center;">
                        @php
                            $foto = $usuario->user->profile_photo_path ?? $usuario->Foto_de_perfil ?? null;
                        @endphp
                        @if($foto)
                            <img src="{{ public_path('storage/'.ltrim($foto, '/')) }}" alt="Foto" style="width:60px; height:60px; object-fit:cover; border-radius:6px;" />
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $usuario->user->name ?? $usuario->Nombres ?? '' }}</td>
                    <td>{{ $usuario->Apellidos ?? '' }}</td>
                    <td>{{ $usuario->user->email ?? '' }}</td>
                    <td>{{ $usuario->Estado ?? '' }}</td>
                    <td>{{ $usuario->carrera->Nombre_Carrera ?? '' }}</td>
                    <td>{{ $usuario->carrera->universidad->Nombre_Universidad ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
