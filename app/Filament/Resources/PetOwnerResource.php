<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PetOwnerResource\Pages;
use App\Filament\Resources\PetOwnerResource\RelationManagers;
use App\Models\PetOwner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\HiddenInput;
use Illuminate\Support\Facades\Auth;

class PetOwnerResource extends Resource
{
    protected static ?string $model = PetOwner::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pet Owner Information')
                    ->schema([
                        TextInput::make('petowners_name')
                            ->label('Pet Owner Name')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('petowners_address')
                            ->label('Pet Owner Address')
                            ->required()
                            ->maxLength(255),
                        
                        TextInput::make('petowners_phone')
                            ->label('Pet Owner Phone')
                            ->required()
                            ->tel()
                            ->maxLength(20),
                        
                        TextInput::make('petowners_email')
                            ->label('Pet Owner Email')
                            ->required()
                            ->email()
                            ->maxLength(255),
                        

                        HiddenInput::make('user_id')
                            ->default(Auth::id())
                            ->required(),
                    ]),
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
