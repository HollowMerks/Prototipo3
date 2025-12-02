<?php

namespace App\Filament\Resources\CategoriaPublicacions;

use App\Filament\Resources\CategoriaPublicacions\Pages\CreateCategoriaPublicacion;
use App\Filament\Resources\CategoriaPublicacions\Pages\EditCategoriaPublicacion;
use App\Filament\Resources\CategoriaPublicacions\Pages\ListCategoriaPublicacions;
use App\Filament\Resources\CategoriaPublicacions\Schemas\CategoriaPublicacionForm;
use App\Filament\Resources\CategoriaPublicacions\Tables\CategoriaPublicacionsTable;
use App\Models\CategoriasArticulos;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CategoriaPublicacionResource extends Resource
{
    protected static ?string $model = CategoriasArticulos::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Contenido y Comunidad';

    public static function form(Schema $schema): Schema
    {
        return CategoriaPublicacionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CategoriaPublicacionsTable::configure($table);
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
            'index' => ListCategoriaPublicacions::route('/'),
            'create' => CreateCategoriaPublicacion::route('/create'),
            'edit' => EditCategoriaPublicacion::route('/{record}/edit'),
        ];
    }
}
