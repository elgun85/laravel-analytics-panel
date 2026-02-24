<?php
namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\DTOs\UserAnalyticsDTO;
use Illuminate\Support\Facades\Cache;

class UserAnalyticsService
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {
    }

    public function getAnalytics(): UserAnalyticsDTO
{
    return Cache::remember('user_analytics', 3000, function () {

        $monthly = $this->userRepository->getAyliqUserSayisi();

        return new UserAnalyticsDTO(
            today: $this->userRepository->getTodayCount(),
            week: $this->userRepository->getThisWeekCount(),
            month: $this->userRepository->getThisMonthCount(),
            total: $this->userRepository->getTotalCount(),
            monthly: $monthly,
        );
    });
}


    }