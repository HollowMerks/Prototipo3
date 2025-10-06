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
                    :imageUrl="null"
                    :badge="$record->Nombre_Rol"
                    :title="$record->Nombre_Rol"
                    :footer="$record->Descripcion"
                    :backContent="$record->Descripcion"
                />
            @endforeach
        </div>
    </div>
</x-filament-panels::page>
