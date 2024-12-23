<?php

namespace App\Filament\Resources\TahfizhResource\Pages;

use App\Filament\Resources\TahfizhResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTahfizhs extends ListRecords
{
    protected static string $resource = TahfizhResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
