<?php

namespace App\Filament\Resources\PembayaranWifiResource\Pages;

use App\Filament\Resources\PembayaranWifiResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePembayaranWifi extends CreateRecord
{
    protected static string $resource = PembayaranWifiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
