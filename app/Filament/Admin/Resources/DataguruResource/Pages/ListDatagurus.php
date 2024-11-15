<?php

namespace App\Filament\Admin\Resources\DataguruResource\Pages;

use App\Filament\Admin\Resources\DataguruResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDatagurus extends ListRecords
{
    protected static string $resource = DataguruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
