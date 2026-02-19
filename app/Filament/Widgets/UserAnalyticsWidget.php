<?php

namespace App\Filament\Widgets;

use App\Services\UserAnalyticsService;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserAnalyticsWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $analytics = app(UserAnalyticsService::class)->getAnalytics();

      // dd($analytics);
        return [
            Stat::make('Today Users', $analytics->today),
            Stat::make('This Week Users',  $analytics->week),
            Stat::make('This Month Users', $analytics->month),
            Stat::make('Total Users', $analytics->total),


            // Stat::make('Unique views', '192.1k'),
            // Stat::make('Bounce rate', '21%'),
            // Stat::make('Average time on page', '3:12'),
        ];
    }
}
