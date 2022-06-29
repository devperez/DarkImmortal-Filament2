<?php

namespace App\Filament\Widgets;

use App\Models\Comment;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\LineChartWidget;

class PostsChart extends LineChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
{
    $data = Trend::model(Comment::class)
        ->between(
            start: now()->startOfYear(),
            end: now(),
        )
        ->perMonth()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Commentaires',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
}
}