<?php

namespace App\Filament\Widgets;

use App\Services\UserAnalyticsService;
use Filament\Widgets\ChartWidget;

class UserMontlyWidget extends ChartWidget
{
    protected ?string $heading = 'User Montly Widget';

    protected function getData(): array
    {
         $montlyAnalyticcs= app(UserAnalyticsService::class)->getAnalytics();

         $monthly = $montlyAnalyticcs->monthly;
             $labels = $monthly->map(function ($item) {
            return $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
        })->toArray();
        $data = $monthly->pluck('total')->toArray();
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Monthly Users',
                   // 'data' => [dd($montlyAnalyticcs->total)],
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
