<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Carreras</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #4F46E5;
            padding-bottom: 15px;
        }

        .header h1 {
            color: #4F46E5;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .header p {
            color: #666;
            font-size: 12px;
        }

        .report-date {
            text-align: right;
            margin-bottom: 20px;
            font-size: 11px;
            color: #999;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        thead {
            background: linear-gradient(135deg, #4F46E5 0%, #3730A3 100%);
            color: white;
        }

        th {
            padding: 12px;
            text-align: left;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 10px 12px;
            font-size: 11px;
            border-bottom: 1px solid #eee;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #f0f1ff;
        }

        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 10px;
            color: #999;
        }

        .stats {
            margin: 20px 0;
            padding: 15px;
            background-color: #f0f1ff;
            border-left: 4px solid #4F46E5;
            border-radius: 4px;
        }

        .stats strong {
            color: #4F46E5;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📚 Reporte de Carreras</h1>
        <p>Documento generado automáticamente por el sistema</p>
    </div>

    <div class="report-date">
        <strong>Fecha de generación:</strong> {{ now()->format('d/m/Y H:i:s') }}
    </div>

    <div class="stats">
        <strong>Total de carreras registradas:</strong> {{ count($carreras) }}
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 25%;">Nombre de la Carrera</th>
                <th style="width: 15%;">Universidad</th>
                <th style="width: 15%;">Duración</th>
                <th style="width: 45%;">Descripción</th>
            </tr>
        </thead>
        <tbody>
            @forelse($carreras as $carrera)
                <tr>
                    <td><strong>{{ $carrera->Nombre_Carrera }}</strong></td>
                    <td>{{ $carrera->universidad->Nombre_Universidad ?? 'N/A' }}</td>
                    <td>{{ $carrera->Duracion_Carrera ?? 'N/A' }}</td>
                    <td>{{ Str::limit($carrera->Descripcion_Carrera, 100) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #999;">
                        No hay carreras registradas
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Este documento es confidencial y ha sido generado automáticamente por el sistema de gestión académica.</p>
        <p>&copy; {{ date('Y') }} - Todos los derechos reservados</p>
    </div>
</body>
</html>
