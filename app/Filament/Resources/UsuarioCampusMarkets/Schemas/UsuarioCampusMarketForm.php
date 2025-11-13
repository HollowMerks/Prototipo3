<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Schemas;

use App\Models\Carrera;
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
                            ->label('Nombre')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Correo Electrónico')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(table: 'users', column: 'email'),
                    ])
                    ->createOptionUsing(fn (array $data): int => User::create($data)->getKey()),

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

                Select::make('Cod_Universidad')
                    ->label('Universidad')
                    ->relationship('universidad', 'Nombre_Universidad')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function ($set) {
                        $set('Cod_Carrera', null);
                    }),

                Select::make('Cod_Carrera')
                    ->label('Carrera')
                    ->relationship('carrera', 'Nombre_Carrera')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->options(fn ($get) => \App\Models\Carrera::where('Cod_Universidad', $get('Cod_Universidad'))->pluck('Nombre_Carrera', 'Cod_Carrera'))
                    ->createOptionForm([
                        TextInput::make('Nombre_Carrera')
                            ->label('Nombre de la Carrera')
                            ->required()
                            ->maxLength(120),
                        Select::make('Cod_Universidad')
                            ->label('Universidad')
                            ->relationship('universidad', 'Nombre_Universidad')
                            ->required()
                            ->searchable()
                            ->preload(),
                    ])
                    ->createOptionUsing(fn (array $data): int => Carrera::create($data)->getKey()),

            ]);
    }
}
