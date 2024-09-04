<?php

namespace App\Filament\Vet\Resources;

use App\Filament\Vet\Resources\PetOwnerResource\Pages;
use App\Filament\Vet\Resources\PetOwnerResource\RelationManagers;
use App\Models\PetOwner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\HiddenInput;

class PetOwnerResource extends Resource
{
    protected static ?string $model = PetOwner::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('petowners_name')
                ->required()
                ->maxLength(255),
                
            Forms\Components\TextInput::make('petowners_address')
                ->required()
                ->maxLength(255),
                
            Forms\Components\TextInput::make('petowners_phone')
                ->required()
                ->tel() 
                ->maxLength(20),
                
            Forms\Components\TextInput::make('petowners_email')
                ->required()
                ->email() 
                ->maxLength(255),

            HiddenInput::make('user_id')
                ->default(Auth::id())
                ->required(),
            // Forms\Components\Hidden::make('user_id')
            //         ->default(Auth::id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('petowners_name')
                ->sortable()
                ->searchable(),
                
            Tables\Columns\TextColumn::make('petowners_address')
                ->sortable()
                ->searchable(),
                
            Tables\Columns\TextColumn::make('petowners_phone')
                ->sortable()
                ->searchable(),
                
            Tables\Columns\TextColumn::make('petowners_email')
                ->sortable()
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                ]),
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
            'index' => Pages\ListPetOwners::route('/'),
            'create' => Pages\CreatePetOwner::route('/create'),
            'edit' => Pages\EditPetOwner::route('/{record}/edit'),
        ];
    }
}
