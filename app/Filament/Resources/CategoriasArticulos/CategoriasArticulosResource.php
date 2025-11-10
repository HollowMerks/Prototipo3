<?php

namespace App\Filament\Resources\CategoriasArticulos;

use App\Filament\Resources\CategoriasArticulos\Pages\CreateCategoriasArticulos;
use App\Filament\Resources\CategoriasArticulos\Pages\EditCategoriasArticulos;
use App\Filament\Resources\CategoriasArticulos\Pages\ListCategoriasArticulos;
use App\Filament\Resources\CategoriasArticulos\Schemas\CategoriasArticulosForm;
use App\Filament\Resources\CategoriasArticulos\Tables\CategoriasArticulosTable;
use App\Models\CategoriasArticulos;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CategoriasArticulosResource extends Resource
{
    protected static ?string $model = CategoriasArticulos::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBars3BottomRight;

    protected static string|UnitEnum|null $navigationGroup = 'Contenido y Comunidad';

    public static function form(Schema $schema): Schema
    {
        return CategoriasArticulosForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CategoriasArticulosTable::configure($table);
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
            'index' => ListCategoriasArticulos::route('/'),
            'create' => CreateCategoriasArticulos::route('/create'),
            'edit' => EditCategoriasArticulos::route('/{record}/edit'),
        ];
    }
}
