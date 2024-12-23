<?php

namespace App\Filament\Resources\TahsinResource\Pages;

use App\Filament\Resources\TahsinResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTahsin extends EditRecord
{
    protected static string $resource = TahsinResource::class;

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
