<?php

namespace App\Filament\Resources\Universidades\Pages;

use App\Filament\Resources\Universidades\UniversidadesResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action as TableAction;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Models\Universidades;

class ListTrashedUniversidades extends ListRecords
{
    protected static string $resource = UniversidadesResource::class;

    protected function getTableQuery(): Builder
    {
        return $this->getResource()::getModel()::onlyTrashed();
    }

    public function getTitle(): string
    {
        return 'Universidades Archivadas';
    }

    protected function getTableActions(): array
    {
        return [
            TableAction::make('recuperar')
                ->label('Recuperar')
                ->color('success')
                ->icon('heroicon-o-arrow-path')
                ->requiresConfirmation()
                ->modalHeading('¿Estás seguro de recuperar esta universidad?')
                ->modalDescription('La universidad será restaurada y aparecerá nuevamente en la lista activa.')
                ->modalSubmitActionLabel('Recuperar')
                ->modalCancelActionLabel('Cancelar')
                ->action(function ($record) {
                    try {
                        $record->restore();
                        Session::flash('custom_alert', ['message' => 'La universidad fue recuperada correctamente.', 'type' => 'success']);
                    } catch (\Exception $e) {
                        Session::flash('custom_alert', ['message' => 'Error al recuperar la universidad.', 'type' => 'danger']);
                    }
                }),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No hay universidades archivadas para recuperar.';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'No existen universidades archivadas en el sistema.';
    }
}
