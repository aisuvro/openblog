<?php

namespace App\Filament\Resources\ChildCategoryResource\Pages;

use App\Filament\Resources\ChildCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChildCategory extends EditRecord
{
    protected static string $resource = ChildCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
