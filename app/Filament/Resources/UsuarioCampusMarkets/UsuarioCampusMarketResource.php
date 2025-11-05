<?php

namespace App\Filament\Resources\UsuarioCampusMarkets;

use App\Filament\Resources\UsuarioCampusMarkets\Pages\EditUsuarioCampusMarket;
use App\Filament\Resources\UsuarioCampusMarkets\Pages\ListUsuarioCampusMarkets;
use App\Filament\Resources\UsuarioCampusMarkets\Schemas\UsuarioCampusMarketForm;
use App\Filament\Resources\UsuarioCampusMarkets\Tables\UsuarioCampusMarketsTable;
use App\Models\UsuariosCampusMarket;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UsuarioCampusMarketResource extends Resource
{
    protected static ?string $model = UsuariosCampusMarket::class;

    protected static ?string $navigationLabel = 'Usuarios CampusMarket';

    protected static ?string $modelLabel = 'Usuario CampusMarket';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    // protected static ?string $navigationGroup = 'Academico';

    public static function form(Schema $schema): Schema
    {
        return UsuarioCampusMarketForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsuarioCampusMarketsTable::configure($table)
            ->defaultSort('Apellidos');
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->with('rol', 'carrera', 'carrera.universidad');
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
            'index' => ListUsuarioCampusMarkets::route('/'),
            'edit' => EditUsuarioCampusMarket::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            \App\Http\Livewire\ShowProfilePhoto::class,
        ];
    }
}
