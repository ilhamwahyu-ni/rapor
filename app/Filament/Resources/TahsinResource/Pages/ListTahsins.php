<?php

namespace App\Filament\Resources\TahsinResource\Pages;

use App\Filament\Resources\TahsinResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTahsins extends ListRecords
{
    protected static string $resource = TahsinResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
