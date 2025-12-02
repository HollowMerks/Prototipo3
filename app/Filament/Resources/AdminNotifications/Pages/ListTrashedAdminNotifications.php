<?php

namespace App\Filament\Resources\AdminNotifications\Pages;

use App\Filament\Resources\AdminNotifications\AdminNotificationResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\Action as TableAction;
use Filament\Actions\EditAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;
use App\Models\Admin_notificaciones;


class ListTrashedAdminNotifications extends ListRecords
{
    protected static string $resource = AdminNotificationResource::class;

    protected function getTableQuery(): Builder
    {
        return $this->getResource()::getModel()::onlyTrashed();
    }

    public function getTitle(): string
    {
        return 'Notificaciones Inhabilitadas';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'No hay notificaciones inhabilitadas';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'No existen notificaciones eliminadas o inhabilitadas en el sistema.';
    }

    protected function getTableActions(): array
    {
        return [
            TableAction::make('editar')
                ->label('Editar')
                ->color('primary')
                ->icon('heroicon-o-pencil')
                ->action(function ($record) {
                    Session::flash('custom_alert', ['message' => 'No se puede editar la información mientras la notificación está inhabilitada.', 'type' => 'warning']);
                }),

            TableAction::make('recuperar')
                ->label('Recuperar')
                ->color('success')
                ->icon('heroicon-o-arrow-path')
                ->requiresConfirmation()
                ->modalHeading('¿Estás seguro de recuperar esta notificación?')
                ->modalDescription('Esta acción restaurará la notificación y la volverá a habilitar.')
                ->modalSubmitActionLabel('Recuperar')
                ->modalCancelActionLabel('Cancelar')
                ->action(function ($record) {
                    try {
                        $record->restore();
                        $record->Estado_Notificacion = 'Habilitado';
                        $record->save();
                        Session::flash('custom_alert', ['message' => '¡Se recuperó correctamente!', 'type' => 'success']);

                        // Si ya no quedan registros inhabilitados, redirigimos a la vista principal
                        if (Admin_notificaciones::onlyTrashed()->count() === 0) {
                            return redirect(AdminNotificationResource::getUrl('index'));
                        }
                    } catch (\Exception $e) {
                        Session::flash('custom_alert', ['message' => 'Error al recuperar', 'type' => 'danger']);
                    }
                }),

            TableAction::make('eliminar_permanentemente')
                ->label('Eliminar permanentemente')
                ->color('danger')
                ->icon('heroicon-o-trash')
                ->requiresConfirmation()
                ->modalHeading('¿Estás seguro de eliminar permanentemente esta notificación?')
                ->modalDescription('Esta acción eliminará el registro de la base de datos de forma irreversible.')
                ->modalSubmitActionLabel('Eliminar permanentemente')
                ->modalCancelActionLabel('Cancelar')
                ->action(function ($record) {
                    try {
                        $record->forceDelete();
                        Session::flash('custom_alert', ['message' => 'Registro eliminado permanentemente.', 'type' => 'danger']);
                    } catch (\Exception $e) {
                        Session::flash('custom_alert', ['message' => 'Error al eliminar permanentemente', 'type' => 'danger']);
                    }
                }),
        ];
    }
}
