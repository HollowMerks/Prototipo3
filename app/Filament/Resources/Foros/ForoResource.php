<?php

namespace App\Filament\Resources\Foros;

use App\Filament\Resources\Foros\Pages\CreateForo;
use App\Filament\Resources\Foros\Pages\EditForo;
use App\Filament\Resources\Foros\Pages\ListForos;
use App\Filament\Resources\Foros\Schemas\ForoForm;
use App\Filament\Resources\Foros\Tables\ForosTable;
use App\Models\Foro;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ForoResource extends Resource
{
    protected static ?string $model = Foro::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedInformationCircle;

    protected static ?string $recordTitleAttribute = 'Titulo_Foro';

    public static function form(Schema $schema): Schema
    {
        return ForoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ForosTable::configure($table);
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
            'index' => ListForos::route('/'),
            'create' => CreateForo::route('/create'),
            'edit' => EditForo::route('/{record}/edit'),
        ];
    }
}
