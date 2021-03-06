<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\LineChartWidget;

class PostsChart extends LineChartWidget
{
    protected static ?string $heading = 'Publications';
    protected static ?string $pollingInterval = null;
    protected static ?int $sort = 2;


    protected function getData(): array
{
    $data = Trend::model(Post::class)
        ->between(
            start: now()->startOfYear(),
            end: now(),
        )
        ->perMonth()
        ->count();

    return [
        'datasets' => [
            [
                'label' => 'Publications',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
}
}

