<?php

namespace App\Services;

use App\Models\AnalyticsUser;
use App\Models\User;

class UserAnalyticsAggregationService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function aggregateToday(): void
    {

        $today = today();

        $daily = User::whereDate('created_at', $today)->count();
        $weekly = User::whereBetween(
            'created_at',
            [
                today()->copy()->startOfWeek(),
                today()->copy()->endOfWeek()
            ]
        )->count();

        $monthly = User::whereMonth('created_at', $today->month)
            ->whereYear('created_at', $today->year)
            ->count();

        $total = User::count();

        AnalyticsUser::updateOrCreate(
            ['date' => $today],
            [
                'daily_count' => $daily,
                'weekly_count' => $weekly,
                'monthly_count' => $monthly,
                'total_count' => $total
            ]
        );
    }
}
