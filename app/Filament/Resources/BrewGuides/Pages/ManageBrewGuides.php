<?php

namespace App\Filament\Resources\BrewGuides\Pages;

use App\Filament\Resources\BrewGuides\BrewGuideResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageBrewGuides extends ManageRecords
{
    protected static string $resource = BrewGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
