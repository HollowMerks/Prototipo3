<?php

namespace App\Filament\Resources\ReputacionEntreUsuarios;

use App\Filament\Resources\ReputacionEntreUsuarios\Pages\CreateReputacionEntreUsuarios;
use App\Filament\Resources\ReputacionEntreUsuarios\Pages\EditReputacionEntreUsuarios;
use App\Filament\Resources\ReputacionEntreUsuarios\Pages\ListReputacionEntreUsuarios;
use App\Filament\Resources\ReputacionEntreUsuarios\Schemas\ReputacionEntreUsuariosForm;
use App\Filament\Resources\ReputacionEntreUsuarios\Tables\ReputacionEntreUsuariosTable;
use App\Models\ReputacionEntreUsuarios;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReputacionEntreUsuariosResource extends Resource
{
    protected static ?string $model = ReputacionEntreUsuarios::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedStar;

    protected static ?string $recordTitleAttribute = 'ID_Reputacion';

    public static function form(Schema $schema): Schema
    {
        return ReputacionEntreUsuariosForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReputacionEntreUsuariosTable::configure($table);
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
            'index' => ListReputacionEntreUsuarios::route('/'),
            'create' => CreateReputacionEntreUsuarios::route('/create'),
            'edit' => EditReputacionEntreUsuarios::route('/{record}/edit'),
        ];
    }
}
