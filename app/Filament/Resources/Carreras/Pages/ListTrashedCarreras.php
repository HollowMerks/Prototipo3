<?php

namespace App\Filament\Resources\Carreras\Pages;

use App\Filament\Resources\Carreras\CarrerasResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action as TableAction;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Models\Carrera;

class ListTrashedCarreras extends ListRecords
{
    protected static string $resource = CarrerasResource::class;

    protected function getTableQuery(): Builder
    {
        return $this->getResource()::getModel()::onlyTrashed();
    }

    public function getTitle(): string
    {
        return 'Carreras Archivadas';
    }


    protected function getTableActions(): array
    {
        return [
            TableAction::make('recuperar')
                ->label('Recuperar')
                ->color('success')
                ->icon('heroicon-o-arrow-path')
                ->requiresConfirmation()
                ->modalHeading('¿Estás seguro de recuperar esta carrera?')
                ->modalDescription('La carrera será restaurada y aparecerá nuevamente en la lista activa.')
                ->modalSubmitActionLabel('Recuperar')
                ->modalCancelActionLabel('Cancelar')
                ->action(function ($record) {
                    try {
                        $record->restore();
                        Session::flash('custom_alert', ['message' => 'La carrera fue recuperada correctamente.', 'type' => 'success']);
                    } catch (\Exception $e) {
                        Session::flash('custom_alert', ['message' => 'Error al recuperar la carrera.', 'type' => 'danger']);
                    }
                }),
        ];
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No hay carreras archivadas para recuperar.';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'No existen carreras archivadas en el sistema.';
    }
}
