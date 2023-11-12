<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Costumer;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use App\Filament\Resources\CostumerResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CostumerResource\RelationManagers;

class CostumerResource extends Resource
{
    protected static ?string $model = Costumer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationGroup = 'Shop';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->prefixIcon('heroicon-m-identification'),

                        TextInput::make('email')
                            ->unique()
                            ->email()
                            ->prefixIcon('heroicon-m-envelope'),
                        TextInput::make('phone')
                            ->prefixIcon('heroicon-m-phone')
                            ->numeric()
                            ->tel()
                            ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                        DatePicker::make('birthday')
                            ->prefixIcon('heroicon-m-calendar-days')
                            ->native(false),
                    ])
                    ->columns(2)
                    ->columnSpan(['lg' => fn(?Costumer $record)=>$record === null? 3 :2]),

                Section::make()
                    ->schema([
                        Placeholder::make('Created at')
                            ->content(fn (Costumer $record): ?string => $record->created_at->diffForHumans()),
                        Placeholder::make('Updated at')
                        ->content(fn (Costumer $record): ?string => $record->updated_at->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->visibleOn('edit')
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
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
            'index' => Pages\ListCostumers::route('/'),
            'create' => Pages\CreateCostumer::route('/create'),
            'edit' => Pages\EditCostumer::route('/{record}/edit'),
        ];
    }
}
