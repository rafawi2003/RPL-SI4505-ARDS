<?php

namespace App\Filament\Resources\RefillGalonResource\Pages;

use App\Filament\Resources\RefillGalonResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRefillGalon extends CreateRecord
{
    protected static string $resource = RefillGalonResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
