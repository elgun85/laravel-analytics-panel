<?php

namespace App\Filament\Widgets;

use App\Models\AnalyticsUser;
use App\Services\UserAnalyticsService;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserAnalyticsWidget extends StatsOverviewWidget
{
  use InteractsWithPageFilters;

  protected static ?int $sort = 1;
  protected function getStats(): array
  {
    $startDate = $this->pageFilters['startDate'] ?? null;
    $endDate = $this->pageFilters['endDate'] ?? null;
    $data = AnalyticsUser::
      //where('date', today())->
      first();
    $tarix =  app(UserAnalyticsService::class)
      ->getAnalytics($startDate, $endDate);


    return [
      Stat::make('Tarixe gore', $tarix->tarix ?? 0),
      Stat::make('Daily', $data?->daily_count ?? 0),
      Stat::make('Weekly', $data?->weekly_count ?? 0),
      Stat::make('Monthly', $data?->monthly_count ?? 0),
      Stat::make('Total', $data?->total_count ?? 0),
    ];
  }
}
