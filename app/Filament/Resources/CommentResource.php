<?php

namespace App\Filament\Resources;

use App\Models\Comment;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BooleanColumn;
use App\Filament\Resources\CommentResource\Pages;


class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('body'),
                Checkbox::make('check'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('author')->label('Auteur'),
                TextColumn::make('body')->label('Commentaire'),
                BooleanColumn::make('check'),
                TextColumn::make('playlist.groupe'),
                TextColumn::make('post.groupe')->label('Groupe'),
                TextColumn::make('post.morceau')->label('Morceau'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
