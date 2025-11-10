<?php

namespace App\Filament\Resources\Publicaciones;

use App\Filament\Resources\Publicaciones\Pages\CreatePublicaciones;
use App\Filament\Resources\Publicaciones\Pages\EditPublicaciones;
use App\Filament\Resources\Publicaciones\Pages\ListPublicaciones;
use App\Filament\Resources\Publicaciones\Schemas\PublicacionesForm;
use App\Filament\Resources\Publicaciones\Tables\PublicacionesTable;
use App\Models\Publicaciones;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PublicacionesResource extends Resource
{
    protected static ?string $model = Publicaciones::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingStorefront;

    protected static string|UnitEnum|null $navigationGroup = 'Contenido y Comunidad';

    public static function form(Schema $schema): Schema
    {
        return PublicacionesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PublicacionesTable::configure($table);
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
            'index' => ListPublicaciones::route('/'),
            'create' => CreatePublicaciones::route('/create'),
            'edit' => EditPublicaciones::route('/{record}/edit'),
        ];
    }
}
