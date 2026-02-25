<?php

namespace App\Repositories;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;


class EloquentUserRepository implements UserRepositoryInterface
{
    

public function getTarix($startDate = null, $endDate = null): int
{
    return User::query()
        ->when($startDate, fn($q) =>
            $q->whereDate('created_at', '>=', $startDate)
        )
        ->when($endDate, fn($q) =>
            $q->whereDate('created_at', '<=', $endDate)
        )
        ->count();
}


    public function getAyliqUserSayisi(): Collection
    {
        return User::selectRaw(
            'YEAR(created_at) as year,
         MONTH(created_at) as month,
         COUNT(*) as total'
        )
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->orderByRaw('YEAR(created_at) DESC, MONTH(created_at) DESC')
            ->get();
        $months = collect();
        for ($i = 11; $i >= 0; $i--) {

            $date = Carbon::now()->subMonths($i);
            $found = $data->first(function ($item) use ($date) {
                return $item->year == $date->year && $item->month == $date->month;
            });
            $months->push((object)[
                'year' => $date->year,
                'month' => $date->month,
                'total' => $found->total ?? 0,
            ]);
        }
        return $months;
    }
    public function getTodayCount(): int
    {

        return User::whereBetween('created_at', [
            now()->startOfDay(),
            now()->endOfDay()
        ])->count();
    }

    public function getThisWeekCount(): int
    {
        return User::whereBetween('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();
    }

    public function getThisMonthCount(): int
    {
        return User::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->count();
    }

    public function getTotalCount(): int
    {
        return User::count();
    }
}
