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
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\Widgets\StatsOverview;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $recordTitleAttribute = 'groupe';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('groupe'),
                Forms\Components\TextInput::make('morceau'),
                Forms\Components\TextInput::make('album'),
                RichEditor::make('article'),
                TextInput::make('Genre')
                ->datalist([
                    'Black Metal',
                    'Death Metal',
                    'Doom Metal',
                    'Autre',
                ]),
                // Forms\Components\TextInput::make('genre'),
                Forms\Components\TextInput::make('pays'),
                RichEditor::make('paroles'),
                Forms\Components\TextInput::make('clip'),
                FileUpload::make('image')
                ->directory('pochettes')
                ->imageResizeTargetHeight('1290')
                ->imageResizeTargetWidth('2236')
                ->label('Carte'),
                FileUpload::make('couv')
                ->directory('couvertures'),
                Toggle::make('draft')->label('Publier ?'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('id')->label('#')->sortable(),
                Tables\Columns\TextColumn::make('groupe')->sortable(),
                Tables\Columns\TextColumn::make('morceau'),
                Tables\Columns\BooleanColumn::make('comments.post')->label('Commentaire'),
                Tables\Columns\TextColumn::make('album'),
                Tables\Columns\TextColumn::make('genre')->label('Genre'),
                Tables\Columns\BooleanColumn::make('draft')->label('Publié'),
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

    public static function getWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    // public static function getGloballySearchableAttributes(): array
    // {
    //     return ['Groupe', 'Morceau', 'Album'];
    // }
}
