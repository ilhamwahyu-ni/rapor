<?php

namespace App\Filament\Resources\TahfizhResource\Pages;

use App\Filament\Resources\TahfizhResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTahfizh extends EditRecord
{
    protected static string $resource = TahfizhResource::class;

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
