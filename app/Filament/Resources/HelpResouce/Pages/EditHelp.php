<?php

namespace App\Filament\Resources\HelpResource\Pages;

use App\Filament\Resources\HelpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHelp extends EditRecord
{
    protected static string $resource = HelpResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
