<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getForms(): array
    {
        return [
            'form' => $this->makeForm()
                ->model(static::getModel())
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->maxLength(191)
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->unique('users', 'email')
                        ->email()
                        ->required(),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->required()
                        ->minLength(6),
                    Forms\Components\Toggle::make('isAdmin'),
                ])
                ->statePath('data')
                ->inlineLabel(config('filament.layout.forms.have_inline_labels')),
        ];
    }
}
