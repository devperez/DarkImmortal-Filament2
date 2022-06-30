<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use App\Models\Genre;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\PostResource\Pages;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $recordTitleAttribute = 'groupe';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('couv')
                ->directory('couvertures')
                ->columnSpan('full'),
                FileUpload::make('image')
                ->directory('pochettes')
                ->imageResizeTargetHeight('1290')
                ->imageResizeTargetWidth('2236')
                ->label('Carte'),
                Forms\Components\TextInput::make('groupe'),
                Forms\Components\TextInput::make('morceau'),
                Forms\Components\TextInput::make('album'),
                RichEditor::make('article'),
                Forms\Components\TextInput::make('genre'),
                Forms\Components\TextInput::make('pays'),
                RichEditor::make('paroles'),
                Forms\Components\TextInput::make('clip'),
                Toggle::make('is_published')->label('Cliquer pour publier'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Carte'),
                Tables\Columns\ImageColumn::make('couv')->label('Couverture'),
                Tables\Columns\TextColumn::make('groupe')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('morceau')->limit(10)->searchable(),
                Tables\Columns\BooleanColumn::make('comments.post')->label('Commentaire'),
                Tables\Columns\TextColumn::make('album')->searchable(),
                Tables\Columns\TextColumn::make('genre')->label('Genre'),
                Tables\Columns\BooleanColumn::make('is_published')->label('Publié'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('draft')
                ->options([
                    'draft'=> 'draft'
                ])
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
