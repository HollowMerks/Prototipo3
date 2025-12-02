<?php

namespace App\Filament\Resources\AdminNotifications;

use App\Filament\Resources\AdminNotifications\Pages\CreateAdminNotification;
use App\Filament\Resources\AdminNotifications\Pages\EditAdminNotification;
use App\Filament\Resources\AdminNotifications\Pages\ListAdminNotifications;
use App\Filament\Resources\AdminNotifications\Pages\ListTrashedAdminNotifications;
use App\Filament\Resources\AdminNotifications\Schemas\AdminNotificationForm;
use App\Filament\Resources\AdminNotifications\Tables\AdminNotificationsTable;
use App\Models\Admin_notificaciones;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AdminNotificationResource extends Resource
{
    protected static ?string $model = Admin_notificaciones::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBellAlert;

    protected static ?string $navigationLabel = 'Notificaciones Administrativas';

    protected static ?string $modelLabel = 'Notificaciones a usuarios';

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return AdminNotificationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdminNotificationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAdminNotifications::route('/'),
            'trashed' => ListTrashedAdminNotifications::route('/trashed'),
            'create' => CreateAdminNotification::route('/create'),
            'edit' => EditAdminNotification::route('/{record}/edit'),
        ];
    }
}
