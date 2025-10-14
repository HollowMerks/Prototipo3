<?php

namespace App\Filament\Resources\Universidades\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class UniversidadesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('Nombre_Universidad')
                    ->label('Nombre de la Universidad')
                    ->required()
                    ->maxLength(120)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('Correo_Universidad')
                    ->label('Correo Electrónico')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(120)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('Telefono_Universidad')
                    ->label('Teléfono')
                    ->tel()
                    ->maxLength(20),

                Forms\Components\Textarea::make('Direccion_Universidad')
                    ->label('Dirección')
                    ->maxLength(255)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('Universisdad_foto_de_portada')
                    ->label('Foto de Portada')
                    ->image()
                    ->directory('universidades/portadas')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('Universisdad_foto_de_perfil')
                    ->label('Foto de Perfil')
                    ->image()
                    ->directory('universidades/perfiles')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('Sitio_Web')
                    ->label('Sitio Web')
                    ->url()
                    ->placeholder('https://www.ejemplo.com')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('Descripcion')
                    ->label('Descripción')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\TimePicker::make('Hora_apertura')
                    ->label('Hora de Apertura')
                    ->seconds(false),

                Forms\Components\TimePicker::make('Hora_cierre')
                    ->label('Hora de Cierre')
                    ->seconds(false),
            ]);
    }
}
