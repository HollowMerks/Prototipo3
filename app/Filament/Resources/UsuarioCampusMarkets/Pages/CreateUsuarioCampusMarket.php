<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Pages;

use App\Filament\Resources\UsuarioCampusMarkets\UsuarioCampusMarketResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUsuarioCampusMarket extends CreateRecord
{
    protected static string $resource = UsuarioCampusMarketResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
