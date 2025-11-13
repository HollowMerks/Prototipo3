<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Schemas;

use App\Models\User;
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
                Select::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->getOptionLabelFromRecordUsing(fn (User $record) => $record->name.' ('.$record->email.')')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nombres')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        TextInput::make('password')
                            ->label('Contraseña')
                            ->password()
                            ->required()
                            ->minLength(8)
                            ->maxLength(255),
                    ]),
                TextInput::make('Apellidos')
                    ->label('Apellidos')
                    ->required()
                    ->maxLength(120),
                Select::make('Genero')
                    ->label('Género')
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
                TextInput::make('Telefono')
                    ->label('Teléfono')
                    ->tel()
                    ->nullable()
                    ->maxLength(20),
                FileUpload::make('Foto_de_portada')
                    ->label('Foto de Portada')
                    ->image()
                    ->directory('fotos-portada')
                    ->nullable(),
                FileUpload::make('Foto_de_perfil')
                    ->label('Foto de Perfil')
                    ->image()
                    ->directory('fotos-perfil')
                    ->avatar()
                    ->nullable(),
                Select::make('Cod_Rol')
                    ->label('Rol')
                    ->relationship('rol', 'Nombre_Rol')
                    ->required()
                    ->default(3),
                Select::make('Cod_Carrera')
                    ->label('Carrera')
                    ->relationship('carrera', 'Nombre_Carrera')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('Cod_Universidad')
                    ->label('Universidad')
                    ->relationship('universidad', 'Nombre_Universidad')
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }
}
