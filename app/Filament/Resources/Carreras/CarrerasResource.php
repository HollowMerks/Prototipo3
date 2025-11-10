<?php

namespace App\Filament\Resources\Carreras;

use App\Filament\Resources\Carreras\Pages\EditCarreras;
use App\Filament\Resources\Carreras\Pages\ListCarreras;
use App\Filament\Resources\Carreras\Schemas\CarrerasForm;
use App\Filament\Resources\Carreras\Tables\CarrerasTable;
use App\Models\Carrera;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CarrerasResource extends Resource
{
    protected static ?string $model = Carrera::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBookmarkSquare;

    protected static ?string $navigationLabel = 'Carreras';

    protected static string|UnitEnum|null $navigationGroup = 'Academico';

    public static function form(Schema $schema): Schema
    {
        return CarrerasForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CarrerasTable::configure($table);
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->with('universidad');
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
            'index' => ListCarreras::route('/'),
            'edit' => EditCarreras::route('/{record}/edit'),
        ];
    }
}
