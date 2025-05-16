<?php

namespace App\Filament\Resources\LeaveTypesResource\Pages;

use App\Filament\Resources\LeaveTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLeaveTypes extends CreateRecord
{
    protected static string $resource = LeaveTypesResource::class;
    protected static ?string $title = 'Buat Jenis Cuti';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
