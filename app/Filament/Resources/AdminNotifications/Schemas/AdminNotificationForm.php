<?php

namespace App\Filament\Resources\AdminNotifications\Schemas;

use App\Models\Roles;
use App\Models\UsuariosCampusMarket;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class AdminNotificationForm
{
    public static function configure(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->components([
                Select::make('tipo_envio')
                    ->label('Enviar a:')
                    ->options([
                        'specific_user' => 'Usuario específico',
                        'by_role' => 'Por rol',
                        'all_users' => 'A todos los usuarios',
                    ])
                    ->default('specific_user')
                    ->required()
                    ->live(),
                Select::make('ID_Usuario')
                    ->label('Seleccionar Usuario')
                    ->options(UsuariosCampusMarket::all()->pluck('Nombres', 'ID_Usuario'))
                    ->searchable()
                    ->preload()
                    ->required()
                    ->visible(fn ($get) => $get('tipo_envio') === 'specific_user'),

                Select::make('Cod_Rol')
                    ->label('Seleccionar Rol')
                    ->options(Roles::all()->pluck('Nombre_Rol', 'Cod_Rol'))
                    ->required()
                    ->visible(fn ($get) => $get('tipo_envio') === 'by_role'),

                TextInput::make('Titulo_Notificacion')
                    ->label('Título')
                    ->required()
                    ->maxLength(150),

                Textarea::make('Mensaje_Notificacion')
                    ->label('Mensaje')
                    ->required(),

                FileUpload::make('imgen')
                    ->label('Imagen')
                    ->image()
                    ->directory('notificaciones'),
            ]);
    }
}
