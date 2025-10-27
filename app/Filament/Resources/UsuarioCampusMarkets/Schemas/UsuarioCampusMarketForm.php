<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UsuarioCampusMarketForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('Nombres')
                    ->label('Nombres')
                    ->required()
                    ->maxLength(120),
                TextInput::make('Apellidos')
                    ->label('Apellidos')
                    ->required()
                    ->maxLength(120),
                Select::make('Genero')
                    ->label('Genero')
                    ->options([
                        'Hombre' => 'Hombre',
                        'Mujer' => 'Mujer',
                        'Prefiero no decirlo' => 'Prefiero no decirlo',
                    ])
                    ->nullable(),
                Select::make('Estado')
                    ->label('Estado')
                    ->options([
                        'Habilitado' => 'Habilitado',
                        'Inhabilitado' => 'Inhabilitado',
                        'Baneado' => 'Baneado',
                        'Suspendido' => 'Suspendido',
                    ])
                    ->default('Habilitado')
                    ->required(),
                TextInput::make('Correo_Electronico')
                    ->label('Correo Electrónico')
                    ->email()
                    ->required()
                    ->maxLength(120),
                TextInput::make('Contrasena')
                    ->label('Contraseña')
                    ->required(fn ($context) => $context === 'create')
                    ->maxLength(255),
                TextInput::make('Telefono')
                    ->label('Teléfono')
                    ->nullable()
                    ->maxLength(255),
                FileUpload::make('Foto_de_portada')
                    ->label('Foto de Portada')
                    ->image()
                    ->nullable(),
                FileUpload::make('Foto_de_perfil')
                    ->label('Foto de Perfil')
                    ->image()
                    ->nullable(),
                Select::make('Cod_Rol')
                    ->label('Rol')
                    ->options([
                        1 => 'SuperAdministrador',
                        2 => 'Moderador',
                        3 => 'Estudiante',
                    ])
                    ->default(3)
                    ->required(),
                Select::make('Cod_Carrera')
                    ->label('Carrera')
                    ->relationship('carrera', 'Nombre_Carrera')
                    ->required(),
                Select::make('Cod_Universidad')
                    ->label('Universidad')
                    ->relationship('universidad', 'Nombre_Universidad')
                    ->required(),
            ]);
    }
}
