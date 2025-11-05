<?php

namespace App\Filament\Resources\VentaEntreUsuarios;

use App\Filament\Resources\VentaEntreUsuarios\Pages\CreateVentaEntreUsuarios;
use App\Filament\Resources\VentaEntreUsuarios\Pages\EditVentaEntreUsuarios;
use App\Filament\Resources\VentaEntreUsuarios\Pages\ListVentaEntreUsuarios;
use App\Filament\Resources\VentaEntreUsuarios\Schemas\VentaEntreUsuariosForm;
use App\Filament\Resources\VentaEntreUsuarios\Tables\VentaEntreUsuariosTable;
use App\Models\VentaEntreUsuarios;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VentaEntreUsuariosResource extends Resource
{
    protected static ?string $model = VentaEntreUsuarios::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?string $recordTitleAttribute = 'ID_Venta';

    public static function form(Schema $schema): Schema
    {
        return VentaEntreUsuariosForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VentaEntreUsuariosTable::configure($table);
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
            'index' => ListVentaEntreUsuarios::route('/'),
            'create' => CreateVentaEntreUsuarios::route('/create'),
            'edit' => EditVentaEntreUsuarios::route('/{record}/edit'),
        ];
    }
}
