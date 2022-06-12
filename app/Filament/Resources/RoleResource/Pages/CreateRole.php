<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;
    protected function getForms(): array
    {
        return [
            'form' => $this->makeForm()
                ->model(static::getModel())
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('name')->required()->unique('roles', 'name')
                ])
                ->statePath('data')
                ->inlineLabel(config('filament.layout.forms.have_inline_labels')),
        ];
    }
}
