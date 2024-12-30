<?php

namespace App\Filament\Resources\RaporSummaryResource\Pages;

use App\Filament\Resources\RaporSummaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRaporSummaries extends ListRecords
{
    protected static string $resource = RaporSummaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
