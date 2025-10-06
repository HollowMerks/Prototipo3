<div>
    <p><strong>Estado:</strong> {{ $record->Estado }}</p>
    <p><strong>Rol:</strong> {{ $record->rol?->Nombre_Rol ?? 'N/A' }}</p>
    <p><strong>Correo:</strong> {{ $record->Correo }}</p>
</div>
