<?php

namespace App\Filament\Resources\PembayaranWifiResource\Pages;

use App\Filament\Resources\PembayaranWifiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPembayaranWifis extends ListRecords
{
    protected static string $resource = PembayaranWifiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
