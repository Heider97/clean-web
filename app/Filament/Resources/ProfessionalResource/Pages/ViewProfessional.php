<?php

namespace App\Filament\Resources\ProfessionalResource\Pages;

use App\Filament\Resources\ProfessionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProfessional extends ViewRecord
{
    protected static string $resource = ProfessionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
