<?php

namespace App\Filament\Resources\RaporSummaryResource\Pages;

use App\Filament\Resources\RaporSummaryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRaporSummary extends CreateRecord
{
    protected static string $resource = RaporSummaryResource::class;

    protected static bool $canCreateAnother = false;
     //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
