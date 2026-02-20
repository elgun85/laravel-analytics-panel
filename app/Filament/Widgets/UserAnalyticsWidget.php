<?php

namespace App\Filament\Widgets;

use App\Models\AnalyticsUser;
use App\Services\UserAnalyticsService;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserAnalyticsWidget extends StatsOverviewWidget
{
  protected function getStats(): array
  {
    //  $analytics = app(UserAnalyticsService::class)->getAnalytics();
    $data = AnalyticsUser::where('date', today())->first();


    /*         return [
            Stat::make('Today Users', $analytics->today),
            Stat::make('This Week Users',  $analytics->week),
            Stat::make('This Month Users', $analytics->month),
           Stat::make('Total Users', $analytics->total),

        ]; */

    return [
      Stat::make('Daily', $data?->daily_count ?? 0),
      Stat::make('Weekly', $data?->weekly_count ?? 0),
      Stat::make('Monthly', $data?->monthly_count ?? 0),
      Stat::make('Total', $data?->total_count ?? 0),
    ];
  }
}
