<?php

namespace App\Filament\Resources\OrderResource\Pages;

use Filament\Forms;
use App\Models\Order;
use Filament\Actions;
use App\Models\Product;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Enums\OrderStatus;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\OrderResource;
use Filament\Forms\Components\Wizard\Step;
use Filament\Resources\Pages\CreateRecord;
use Filament\Forms\Components\Actions\Action;
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
                    Grid::make(2)
                        ->schema([
                            TextInput::make('number')
                                ->default('OR-' . random_int(100000, 999999))
                                ->readOnly()
                                ->dehydrated()
                                ->required()
                                ->maxLength(32)
                                ->unique(Order::class, 'number', ignoreRecord: true),

                            Forms\Components\Select::make('costumer_id')
                                ->relationship('costumer', 'nama')
                                ->required()
                                ->native(false)
                                ->createOptionForm([
                                    Forms\Components\TextInput::make('name')
                                        ->required()
                                        ->maxLength(255),

                                    Forms\Components\TextInput::make('email')
                                        ->label('Email address')
                                        ->required()
                                        ->email()
                                        ->maxLength(255)
                                        ->unique(),

                                    Forms\Components\TextInput::make('phone')
                                        ->maxLength(255),

                                ])
                                ->createOptionAction(function (Action $action) {
                                    return $action
                                        ->modalHeading('Create customer')
                                        ->modalWidth('lg');
                                }),
                            Forms\Components\Select::make('status')
                                ->options(OrderStatus::class)
                                ->searchable()
                                ->required(),

                            Forms\Components\Textarea::make('notes')
                                ->columnSpanFull()


                        ])

                ]),
            Step::make('Payment')
                ->schema([
                    Section::make()
                        ->schema([
                            Forms\Components\Select::make('product_id')
                                ->relationship('product', 'name')
                                ->required()
                                ->native(false)
                                ->live()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $productData = Product::select('price')->where('id', $state)->first();
                                    $productPrice = number_format($productData->price, 0, ',', ',');
                                    $set('total_price', $productPrice);
                                    $set('qty', 1);
                                }),
                            Forms\Components\TextInput::make('qty')
                                ->numeric()
                                ->live()
                                ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                    $getPrice = str_replace(',', '', $get('total_price'));
                                    $totalPrice = $state * $getPrice;
                                    $set('total_price', number_format($totalPrice, 0, ',', ','));
                                }),
                            Forms\Components\TextInput::make('total_price')
                                ->readOnly(),
                        ])
                        ->columns(3),
                    Section::make('Payment Method')
                        ->schema([
                            Radio::make('shipping_method')
                                ->label('Choose the payment')
                                ->options([
                                    'cash' => 'Cash',

                                ])

                        ])
                ]),
        ];
    }

    protected function handleRecordCreation(array $data): Model
    {

        return static::getModel()::create($data);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['total_price'] = str_replace(',', '', $data['total_price']);

        return $data;
    }
}
