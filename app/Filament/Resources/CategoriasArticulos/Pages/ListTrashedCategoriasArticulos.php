<?php

namespace App\Filament\Resources\CategoriasArticulos\Pages;

use App\Filament\Resources\CategoriasArticulos\CategoriasArticulosResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action as TableAction;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Models\CategoriasArticulos;

class ListTrashedCategoriasArticulos extends ListRecords
{
    protected static string $resource = CategoriasArticulosResource::class;

    protected function getTableQuery(): Builder
    {
        return $this->getResource()::getModel()::onlyTrashed();
    }

    public function getTitle(): string
    {
        return 'Categorías Archivadas';
    }

    protected function getTableActions(): array
    {
        return [
            TableAction::make('recuperar')
                ->label('Recuperar')
                ->color('success')
                ->icon('heroicon-o-arrow-path')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->restore();
                    session()->flash('custom_alert', ['message' => 'Categoría recuperada', 'type' => 'success']);
                    $this->redirect($this->getResource()::getUrl('trashed'));
                }),
            EditAction::make()
                ->visible(false),
        ];
    }
}
