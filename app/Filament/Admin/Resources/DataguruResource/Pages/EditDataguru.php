<?php

namespace App\Filament\Admin\Resources\DataguruResource\Pages;

use App\Filament\Admin\Resources\DataguruResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataguru extends EditRecord
{
    protected static string $resource = DataguruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
