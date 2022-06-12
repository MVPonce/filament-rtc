<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getForms(): array
    {
        return [
            'form' => $this->makeForm()
                ->model(static::getModel())
                ->columns(2)
                ->disabled()
                ->schema([
                    Forms\Components\TextInput::make('name'),
                    Forms\Components\TextInput::make('email'),
                    Forms\Components\Toggle::make('isAdmin'),
                ])
                ->statePath('data')
                ->inlineLabel(config('filament.layout.forms.have_inline_labels')),
        ];
    }
}
