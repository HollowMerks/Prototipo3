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
        {{ $this->table }}
    </div>
</x-filament-panels::page>
