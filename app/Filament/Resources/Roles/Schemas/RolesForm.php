<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RolesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('Nombre_Rol')
                    ->label('Nombre del Rol')
                    ->options([
                        'SuperAdministrador' => 'SuperAdministrador',
                        'Moderador' => 'Moderador',
                        'Estudiante' => 'Estudiante',
                    ])
                    ->default('Estudiante')
                    ->required(),

                TextInput::make('Descripcion')
                    ->maxLength(255)
                    ->nullable(),

                FileUpload::make('Foto_Rol')
                    ->image()
                    ->nullable()
                    ->required(),
            ]);
    }
}
