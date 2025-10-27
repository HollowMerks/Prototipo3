<div>
    <p><strong>Nombre:</strong> {{ $record->Nombre_Carrera }}</p>
    <p><strong>Universidad:</strong> {{ $record->universidad?->Nombre_Universidad ?? 'N/A' }}</p>
    <p><strong>Descripción:</strong> {{ $record->Descripcion_Carrera }}</p>
    <p><strong>Duración:</strong> {{ $record->Duracion_Carrera }}</p>
</div>
