<?php

namespace App\Filament\Resources\AdminNotifications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdminNotificationsExport;
use Illuminate\Support\Facades\URL;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Filament\Resources\AdminNotifications\AdminNotificationResource;
use App\Models\Admin_notificaciones;

class AdminNotificationsTable
{
    public static function configure(Table $table): Table
    {
        $isTrashed = str_contains(url()->current(), '/trashed');

        $headerActions = [
            Action::make('recargar')
                ->label('Recargar')
                ->icon('heroicon-o-arrow-path')
                ->url(fn () => url()->current())
                ->color('secondary'),

            Action::make('reporte_pdf')
                ->label('Descargar PDF')
                ->url(route('reporte.notificaciones.pdf'))
                ->openUrlInNewTab()
                ->icon('heroicon-o-document-text')
                ->color('success'),

            Action::make('export_excel')
                ->label('Descargar Excel')
                ->action(fn () => Excel::download(new AdminNotificationsExport, 'notificaciones_' . date('Y-m-d') . '.xlsx'))
                ->icon('heroicon-o-document-arrow-down')
                ->color('success'),
        ];

        // Cuando no estamos en la vista de trashed, mostrar botones normales
        if (! $isTrashed) {
            $headerActions[] = CreateAction::make()
                ->label('Enviar una notificación')
                ->slideOver(false);

            $headerActions[] = Action::make('gmail_notifications')
                ->label('Ver Notificaciones Gmail')
                ->url('https://accounts.google.com/v3/signin/accountchooser?continue=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&dsh=S-331655303%3A1764635022351124&emr=1&followup=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&ifkv=ARESoU2pQYpSe_ShN-An_sXe9j_oGahLVeezj7_gvEPKAannlkJIHmxN0fIqLDHse_Yb7NLlAtLfbA&osid=1&passive=1209600&service=mail&flowName=GlifWebSignIn&flowEntry=ServiceLogin')
                ->openUrlInNewTab()
                ->icon(fn () => view('components.gmail-icon'))
                ->color('white');
        }

        if ($isTrashed) {
            $headerActions[] = Action::make('habilitadas')
                ->label('Habilitadas')
                ->url(AdminNotificationResource::getUrl('index'))
                ->icon('heroicon-o-check')
                ->color('success');
        } else {
            $headerActions[] = Action::make('ver_inhabilitadas')
                ->label('Inhabilitadas')
                ->url(AdminNotificationResource::getUrl('trashed'))
                ->icon('heroicon-o-trash')
                ->color('danger');
        }

        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('ID_Notificacion')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Destinatario_Notificacion')
                    ->label('Destinatario')
                    ->sortable()
                    ->searchable()
                    ->default('No especificado'),
                TextColumn::make('Titulo_Notificacion')
                    ->label('Título')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Mensaje_Notificacion')
                    ->label('Mensaje')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Estado_Notificacion')
                    ->label('Estado')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Fecha_Envio')
                    ->label('Fecha de Envío')
                    ->sortable()
                    ->dateTime('d/m/Y H:i'),
            ])->recordActions([
            EditAction::make()
                ->visible(fn ($record) => ! $record->trashed()),

            Action::make('recuperar')
                ->label('Recuperar')
                ->icon('heroicon-o-arrow-path')
                ->color('success')
                ->visible(fn ($record) => $record->trashed())
                ->requiresConfirmation()
                ->modalHeading('¿Estás seguro de recuperar esta notificación?')
                ->modalSubmitActionLabel('Recuperar')
                ->modalCancelActionLabel('Cancelar')
                ->action(function ($record) {
                    try {
                        $record->restore();
                        $record->Estado_Notificacion = 'Habilitado';
                        $record->save();
                        session()->flash('custom_alert', ['message' => '¡Se recuperó correctamente!', 'type' => 'success']);

                        // Si ya no quedan registros inhabilitados, redirigimos a la vista principal
                        if (\App\Models\Admin_notificaciones::onlyTrashed()->count() === 0) {
                            return redirect(AdminNotificationResource::getUrl('index'));
                        }
                    } catch (\Exception $e) {
                        session()->flash('custom_alert', ['message' => 'Error al recuperar.', 'type' => 'danger']);
                    }
                }),

            Action::make('eliminar')
                ->label('Eliminar')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->visible(fn ($record) => ! $record->trashed())
                ->requiresConfirmation()
                ->action(function ($record) {
                    try {
                        $record->delete();
                        session()->flash('custom_alert', ['message' => 'Notificación inhabilitada.', 'type' => 'warning']);
                    } catch (\Exception $e) {
                        session()->flash('custom_alert', ['message' => 'Error al inhabilitar.', 'type' => 'danger']);
                    }
                }),
            ])->headerActions($headerActions)->bulkActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ]);
    }
}
