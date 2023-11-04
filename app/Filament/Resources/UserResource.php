<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Role;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Enums\UserRole;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\CheckboxList;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                Section::make('')
                                    ->schema([
                                        TextInput::make('name'),
                                        TextInput::make('email')
                                            ->email()
                                            ->unique(ignoreRecord: true),
                                        TextInput::make('password')
                                            ->password()
                                            ->confirmed()
                                            ->visibleOn('create'),
                                        TextInput::make('password_confirmation')
                                            ->password()
                                            ->visibleOn('create'),

                                    ])

                            ]),
                    ])
                    ->columnSpan(1 / 2),
                Section::make('')
                    ->schema([
                        CheckboxList::make('roles')
                            ->options(function () {
                                return Role::all()->pluck('name', 'name')->toArray();
                            })


                    ])
                    ->columns(2)
                    ->columnSpan(1 / 2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email')
                    ->icon('heroicon-m-envelope')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
