<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Universidades</title>
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
            border-bottom: 3px solid #059669;
            padding-bottom: 15px;
        }

        .header h1 {
            color: #059669;
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
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
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
            background-color: #f0fdf4;
        }

        tbody tr:hover {
            background-color: #dcfce7;
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
            background-color: #f0fdf4;
            border-left: 4px solid #059669;
            border-radius: 4px;
        }

        .stats strong {
            color: #059669;
        }

        .website-link {
            color: #059669;
            text-decoration: none;
            word-break: break-all;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🏫 Reporte de Universidades</h1>
        <p>Documento generado automáticamente por el sistema</p>
    </div>

    <div class="report-date">
        <strong>Fecha de generación:</strong> {{ now()->format('d/m/Y H:i:s') }}
    </div>

    <div class="stats">
        <strong>Total de universidades registradas:</strong> {{ count($universidades) }}
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 18%;">Nombre</th>
                <th style="width: 16%;">Correo</th>
                <th style="width: 14%;">Teléfono</th>
                <th style="width: 18%;">Dirección</th>
                <th style="width: 16%;">Sitio Web</th>
                <th style="width: 9%;">Horario</th>
            </tr>
        </thead>
        <tbody>
            @forelse($universidades as $universidad)
                <tr>
                    <td><strong>{{ $universidad->Nombre_Universidad }}</strong></td>
                    <td>{{ $universidad->Correo_Universidad ?? 'N/A' }}</td>
                    <td>{{ $universidad->Telefono_Universidad ?? 'N/A' }}</td>
                    <td>{{ Str::limit($universidad->Direccion_Universidad, 30) }}</td>
                    <td>
                        @if($universidad->Sitio_Web)
                            <span class="website-link">{{ Str::limit($universidad->Sitio_Web, 25) }}</span>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        {{ $universidad->Hora_apertura?->format('H:i') ?? 'N/A' }} -
                        {{ $universidad->Hora_cierre?->format('H:i') ?? 'N/A' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #999;">
                        No hay universidades registradas
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
