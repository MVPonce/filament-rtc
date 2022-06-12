<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms;

class ViewRole extends ViewRecord
{
    protected static string $resource = RoleResource::class;
    protected function getForms(): array
    {
        return [
            'form' => $this->makeForm()
                ->model(static::getModel())
                ->columns(2)
                ->disabled()
                ->schema([
                    Forms\Components\TextInput::make('name'),
                ])
                ->statePath('data')
                ->inlineLabel(config('filament.layout.forms.have_inline_labels')),
        ];
    }
}
