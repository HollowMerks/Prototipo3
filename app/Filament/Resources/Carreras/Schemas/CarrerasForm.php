<?php

namespace App\Filament\Resources\Carreras\Schemas;

use App\Filament\Resources\Universidades\Schemas\UniversidadesForm;
use App\Models\Universidades;
use Filament\Forms;
use Filament\Schemas\Schema;

class CarrerasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('Nombre_Carrera')
                    ->label('Nombre de la Carrera')
                    ->required()
                    ->maxLength(120)
                    ->columnSpanFull(),

                Forms\Components\Select::make('Cod_Universidad')
                    ->label('Universidad')
                    ->options(Universidades::pluck('Nombre_Universidad', 'Cod_Universidad'))
                    ->required()
                    ->searchable()
                    ->preload()
                    ->createOptionForm(fn (Schema $form) => UniversidadesForm::configure($form))
                    ->createOptionUsing(function (array $data) {
                        // Crea la universidad nueva y retorna su ID
                        return Universidades::create($data)->getKey();
                    })
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('Foto_Carrera')
                    ->label('Foto de la Carrera')
                    ->image()
                    ->nullable()
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('Descripcion_Carrera')
                    ->label('Descripción de la Carrera')
                    ->nullable()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('Duracion_Carrera')
                    ->label('Duración de la Carrera')
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }
}
