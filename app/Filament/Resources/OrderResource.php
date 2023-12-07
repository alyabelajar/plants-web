<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;

use App\Models\Order;

use App\Models\Product;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\Enums\OrderStatus;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Actions\Action;
use App\Filament\Resources\OrderResource\Pages\EditOrder;
use App\Filament\Resources\OrderResource\Pages\ListOrders;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\Pages\CreateOrder;
use Illuminate\Database\Eloquent\Builder;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationGroup = 'Shop';

    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() <= 0 ? 'gray' : 'primary';
    }



    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
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

                        Select::make('costumer_id')
                            ->relationship('costumer', 'nama')
                            ->required()
                            ->native(false)
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('email')
                                    ->label('Email address')
                                    ->required()
                                    ->email()
                                    ->maxLength(255)
                                    ->unique(),

                                TextInput::make('phone')
                                    ->maxLength(255),

                            ])
                            ->createOptionAction(function (Action $action) {
                                return $action
                                    ->modalHeading('Create customer')
                                    ->modalWidth('lg');
                            }),
                        Select::make('status')
                            ->options(OrderStatus::class)
                            ->searchable()
                            ->required(),

                        Textarea::make('notes')
                            ->columnSpanFull()


                    ]),

                Section::make()
                    ->schema([
                        Select::make('product_id')
                            ->relationship('product', 'name')
                            ->required()
                            ->native(false)
                            ->live()
                            ->afterStateUpdated(function (Set $set, $state) {
                                $productData = Product::select('price')->where('id', $state)->first();
                                $productPrice = number_format($productData->price, 0, ',', ',');
                                $set('total_price', $productPrice);
                            }),
                        TextInput::make('qty')
                            ->numeric()
                            ->live()
                            ->afterStateUpdated(function (Get $get, Set $set, $state) {
                                $getPrice = str_replace(',', '', $get('total_price'));
                                $totalPrice = $state * $getPrice;
                                $set('total_price', number_format($totalPrice, 0, ',', ','));
                            }),
                        TextInput::make('total_price')
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
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('number'),
                TextColumn::make('product.name'),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                TextColumn::make('total_price')->money(fn (string $state) => "Rp." . number_format($state, 2, ",", ".")),



            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('costumer', 'product');
    }
}
