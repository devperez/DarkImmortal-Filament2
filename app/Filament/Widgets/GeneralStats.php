<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Playlist;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class GeneralStats extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getCards(): array
    {
        return [
            Card::make("Nombre d'articles", Post::count()),
            Card::make('Nombre de commentaires', Comment::count()),
            Card::make('Nombre de playlists', Playlist::count()),
        ];
    }
}
