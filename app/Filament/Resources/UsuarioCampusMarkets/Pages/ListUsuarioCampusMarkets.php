<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Pages;

use App\Filament\Resources\UsuarioCampusMarkets\UsuarioCampusMarketResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsuarioCampusMarkets extends ListRecords
{
    protected static string $resource = UsuarioCampusMarketResource::class;

    // Remove custom view to use default table view
    // protected string $view = 'filament.resources.usuario-campus-markets-resource.pages.list-usuario-campus-markets';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
