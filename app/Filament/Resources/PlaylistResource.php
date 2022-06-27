<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Playlist;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\PlaylistResource\Pages;

class PlaylistResource extends Resource
{
    protected static ?string $model = Playlist::class;

    protected static ?string $recordTitleAttribute = 'groupe';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('groupe'),
                Forms\Components\TextInput::make('theme'),
                RichEditor::make('article'),
                FileUpload::make('carte')
                ->directory('playlist_pochettes')
                ->imageResizeTargetHeight('1290')
                ->imageResizeTargetWidth('2236'),
                FileUpload::make('couverture')
                ->directory('playlist_couvertures')
                ->imageResizeTargetHeight('1290')
                ->imageResizeTargetWidth('2236'),
                Forms\Components\TextInput::make('clip01'),
                Forms\Components\TextInput::make('clip02'),
                Forms\Components\TextInput::make('clip03'),
                Forms\Components\TextInput::make('clip04'),
                Forms\Components\TextInput::make('clip05'),
                Forms\Components\TextInput::make('clip06'),
                Forms\Components\TextInput::make('clip07'),
                Forms\Components\TextInput::make('clip08'),
                Forms\Components\TextInput::make('clip09'),
                Forms\Components\TextInput::make('clip10'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('groupe')->searchable(),
                Tables\Columns\TextColumn::make('theme')->label('thème')->searchable(),
                Tables\Columns\BooleanColumn::make('comments.playlist')->label('Commentaire'),
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
            'index' => Pages\ListPlaylists::route('/'),
            'create' => Pages\CreatePlaylist::route('/create'),
            'edit' => Pages\EditPlaylist::route('/{record}/edit'),
        ];
    }
}
