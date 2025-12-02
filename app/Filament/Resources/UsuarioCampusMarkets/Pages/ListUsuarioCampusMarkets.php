<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Pages;

use App\Filament\Resources\UsuarioCampusMarkets\UsuarioCampusMarketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsuarioCampusMarkets extends ListRecords
{
    protected static string $resource = UsuarioCampusMarketResource::class;

    protected string $view = 'filament.resources.usuario-campus-markets-resource.pages.list-usuario-campus-markets';

    protected function getHeaderActions(): array
    {
        return [
            // Actions moved to the table headerActions so buttons appear together
        ];
    }
}
