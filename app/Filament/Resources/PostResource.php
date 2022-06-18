<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;


class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('groupe'),
                Forms\Components\TextInput::make('morceau'),
                Forms\Components\TextInput::make('album'),
                RichEditor::make('article'),
                Forms\Components\TextInput::make('genre'),
                Forms\Components\TextInput::make('pays'),
                RichEditor::make('paroles'),
                Forms\Components\TextInput::make('clip'),
                FileUpload::make('image')
                ->directory('pochettes')
                ->imageResizeTargetHeight('1290')
                ->imageResizeTargetWidth('2236'),
                FileUpload::make('couv')
                ->directory('couvertures'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('groupe'),
                Tables\Columns\TextColumn::make('morceau'),
                Tables\Columns\BooleanColumn::make('comments.post'),
                Tables\Columns\TextColumn::make('album'),
                Tables\Columns\TextColumn::make('genre'),
                Tables\Columns\TextColumn::make('pays'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
