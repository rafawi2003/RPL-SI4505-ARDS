<?php

namespace App\Filament\Resources\PembayaranWifiResource\Pages;

use App\Filament\Resources\PembayaranWifiResource;
use Filament\Resources\Pages\EditRecord;

class EditPembayaranWifi extends EditRecord
{
    protected static string $resource = PembayaranWifiResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
