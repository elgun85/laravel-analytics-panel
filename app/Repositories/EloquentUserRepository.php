<?php

namespace App\Repositories;

use App\Models\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function getTodayCount(): int
    {
        return User::whereDate('created_at', [
            now()->startOfDay(),
            now()->endOfDay()
        ])->count();
    }

    public function getThisWeekCount(): int
    {
        return User::whereDate('created_at', [
            now()->startOfWeek(),
            now()->endOfWeek()
        ])->count();
    }

    public function getThisMonthCount(): int
    {
        return User::whereDate('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth()
        ])->count();
    }

    public function getTotalCount(): int
    {
        return User::count();
    }
}
