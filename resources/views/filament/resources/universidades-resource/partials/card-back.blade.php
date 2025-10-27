<div>
    <p><strong>Nombre:</strong> {{ $record->Nombre_Universidad }}</p>
    <p><strong>Correo:</strong> {{ $record->Correo_Universidad }}</p>
    <p><strong>Teléfono:</strong> {{ $record->Telefono_Universidad }}</p>
    <p><strong>Dirección:</strong> {{ $record->Direccion_Universidad }}</p>
    <p><strong>Sitio Web:</strong> {{ $record->Sitio_Web }}</p>
    <p><strong>Descripción:</strong> {{ $record->Descripcion }}</p>
    <p><strong>Hora de Apertura:</strong> {{ $record->Hora_apertura ? $record->Hora_apertura->format('H:i') : 'N/A' }}</p>
    <p><strong>Hora de Cierre:</strong> {{ $record->Hora_cierre ? $record->Hora_cierre->format('H:i') : 'N/A' }}</p>
</div>
