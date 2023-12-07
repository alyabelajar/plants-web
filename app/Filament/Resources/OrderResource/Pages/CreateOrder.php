<?php

namespace App\Filament\Resources\OrderResource\Pages;

use Filament\Actions;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\OrderResource;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\MarkdownEditor;

class CreateOrder extends CreateRecord
{
    use CreateRecord\Concerns\HasWizard;

    protected static string $resource = OrderResource::class;

    protected function getSteps(): array
    {
        return [
            Step::make('Order Details')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->live(),
                    TextInput::make('slug')
                        ->disabled()
                        ->required()
                        ->unique(Category::class, 'slug', fn ($record) => $record),
                ]),
            Step::make('Payment')

                ->schema([
                    MarkdownEditor::make('description')
                        ->columnSpan('full'),
                ]),
        ];
    }
}
