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
        <div class="flex flex-row flex-nowrap justify-start gap-6 overflow-x-auto">
            @foreach ($this->getTableRecords() as $record)
                <x-user-card
                    :imageUrl="null"
                    :badge="$record->NNombre_Rol"
                    :title="$record->Nombre_Rol"
                    :footer="$record->Descripcion"
                    :backContent="$record->Descripcion"
                    class="flex-shrink-0"
                />
            @endforeach
        </div>
    </div>
</x-filament-panels::page>
