<?php

namespace App\Filament\Resources\TahsinResource\Pages;

use App\Filament\Resources\TahsinResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTahsin extends CreateRecord
{
    protected static string $resource = TahsinResource::class;

    protected static bool $canCreateAnother = false;
     //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
