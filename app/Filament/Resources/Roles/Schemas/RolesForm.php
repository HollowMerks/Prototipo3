<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RolesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('Nombre_Rol')
                    ->label('Nombre del Rol')
                    ->required()
                    ->unique(table: 'roles', column: 'Nombre_Rol', ignoreRecord: true)
                    ->maxLength(255),
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
