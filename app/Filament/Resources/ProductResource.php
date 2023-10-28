<?php

namespace App\Filament\Resources;

use Directory;
use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 1,
                ])->schema([
                            Section::make('')->schema([
                                TextInput::make('name'),
                                TextInput::make('description'),
                                TextInput::make('price')
                                    ->numeric(),
                                SpatieMediaLibraryFileUpload::make('product')
                                    ->collection('product'),
                                TextInput::make('discount')
                                    ->numeric(),

                            ])->columnSpan(1/2)
                        ])



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->weight(FontWeight::Bold)
                ->description(fn (Product $record): string => $record->description)
                ->wrap( ),
                TextColumn::make('price')
                ->money('IDR'),
                SpatieMediaLibraryImageColumn::make('product')
                ->collection('product')
                ->width(95)
                ->height(95),

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
