<?php

namespace App\Filament\Resources\TeamResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';

    protected static ?string $recordTitleAttribute = 'email';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('email')->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AssociateAction::make(),
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\DissociateAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DissociateBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
