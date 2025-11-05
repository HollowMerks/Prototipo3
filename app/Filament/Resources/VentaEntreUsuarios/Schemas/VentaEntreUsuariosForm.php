<?php

namespace App\Filament\Resources\VentaEntreUsuarios\Schemas;

use App\Models\ArticuloVenta;
use App\Models\UsuariosCampusMarket;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VentaEntreUsuariosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('ID_Vendedor')
                    ->label('Vendedor')
                    ->options(UsuariosCampusMarket::all()->pluck('Nombres', 'ID_Usuario'))
                    ->required()
                    ->searchable(),

                Select::make('ID_Comprador')
                    ->label('Comprador')
                    ->options(UsuariosCampusMarket::all()->pluck('Nombres', 'ID_Usuario'))
                    ->required()
                    ->searchable(),

                Select::make('Articulo_ID')
                    ->label('Artículo')
                    ->options(ArticuloVenta::all()->pluck('Titulo_Articulo', 'id'))
                    ->required()
                    ->searchable(),

                TextInput::make('Precio_Venta')
                    ->label('Precio de Venta')
                    ->numeric()
                    ->prefix('$')
                    ->required()
                    ->minValue(0),

                DateTimePicker::make('Fecha_Venta')
                    ->label('Fecha de Venta')
                    ->required()
                    ->default(now()),
            ]);
    }
}
