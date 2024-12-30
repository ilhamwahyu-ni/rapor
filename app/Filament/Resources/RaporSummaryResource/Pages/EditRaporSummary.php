<?php

namespace App\Filament\Resources\RaporSummaryResource\Pages;

use App\Filament\Resources\RaporSummaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRaporSummary extends EditRecord
{
    protected static string $resource = RaporSummaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
