<?php

namespace App\Filament\Resources\TahfizhResource\Pages;

use App\Filament\Resources\TahfizhResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTahfizh extends CreateRecord
{
    protected static string $resource = TahfizhResource::class;

    protected static bool $canCreateAnother = false;
     //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
