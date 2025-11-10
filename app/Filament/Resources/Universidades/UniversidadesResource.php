<?php

namespace App\Filament\Resources\Universidades;

use App\Filament\Resources\Universidades\Pages\EditUniversidades;
use App\Filament\Resources\Universidades\Pages\ListUniversidades;
use App\Filament\Resources\Universidades\Schemas\UniversidadesForm;
use App\Filament\Resources\Universidades\Tables\UniversidadesTable;
use App\Models\Universidades;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class UniversidadesResource extends Resource
{
    protected static ?string $model = Universidades::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice;

    protected static ?string $navigationLabel = 'Universidades';

    protected static string|UnitEnum|null $navigationGroup = 'Academico';

    public static function form(Schema $form): Schema
    {
        return UniversidadesForm::configure($form);
    }

    public static function table(Table $table): Table
    {
        return UniversidadesTable::configure($table);
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
            'index' => ListUniversidades::route('/'),
            'edit' => EditUniversidades::route('/{record}/edit'),
        ];
    }
}
