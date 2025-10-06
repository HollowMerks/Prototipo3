<x-filament-panels::page
    @class([
        'fi-resource-list-records-page',
        'fi-resource-' . str_replace('/', '-', $this->getResource()::getSlug()) . '-resource-list-records-page',
    ])
>
    <div class="fi-resource-list-records-page-header">
        <div class="fi-resource-list-records-page-header-actions">
            @foreach ($this->getHeaderActions() as $action)
                {{ $action }}
            @endforeach
        </div>
    </div>

    <div class="fi-resource-list-records-page-content">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ($this->getTableRecords() as $record)
                <x-user-card
                    :imageUrl="url('storage/' . $record->Foto_de_perfil)"
                    :badge="$record->Estado"
                    :title="$record->Nombres"
                    :footer="$record->Correo"
                    :backContent="view('filament.resources.usuario-campus-markets-resource.partials.card-back', ['record' => $record])"
                />
            @endforeach
        </div>
    </div>
</x-filament-panels::page>
