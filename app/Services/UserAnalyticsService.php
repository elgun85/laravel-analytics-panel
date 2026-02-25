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

public function getAnalytics($startDate = null, $endDate = null): UserAnalyticsDTO
{
    return Cache::remember(
        "user_analytics_{$startDate}_{$endDate}",
        3000,
        function () use ($startDate, $endDate) {

            $monthly = $this->userRepository
                ->getAyliqUserSayisi($startDate, $endDate);

            return new UserAnalyticsDTO(
                today: $this->userRepository->getTodayCount($startDate, $endDate),
                week: $this->userRepository->getThisWeekCount($startDate, $endDate),
                month: $this->userRepository->getThisMonthCount($startDate, $endDate),
                total: $this->userRepository->getTotalCount($startDate, $endDate),
                monthly: $monthly,
                tarix: $this->userRepository->getTarix($startDate, $endDate),
            );
        }
    );
}


    }