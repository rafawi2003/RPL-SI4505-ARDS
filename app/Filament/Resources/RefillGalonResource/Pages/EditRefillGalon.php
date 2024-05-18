<?php

namespace App\Filament\Resources\RefillGalonResource\Pages;

use App\Filament\Resources\RefillGalonResource;
use Filament\Resources\Pages\EditRecord;

class EditRefillGalon extends EditRecord
{
    protected static string $resource = RefillGalonResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
