<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Forms;

class EditUser extends EditRecord
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
                        ->email()
                        ->required(),
                    Forms\Components\TextInput::make('password')
                        ->password()
                        ->minLength(6),
                    Forms\Components\Toggle::make('isAdmin')
                        ->disabled(fn() => auth()->id() == $this->record->id),
                ])
                ->statePath('data')
                ->inlineLabel(config('filament.layout.forms.have_inline_labels')),
        ];
    }
    protected function mutateFormDataBeforeSave(array $data): array{
        if($data['password'] === null) unset($data['password']);
        else $data['password'] = bcrypt($data['password']);
        //dd($data);
        return $data;
    }
}
