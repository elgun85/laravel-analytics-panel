<?php
namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use App\DTOs\UserAnalyticsDTO;



class UserAnalyticsService
{
    public function __construct(
        protected UserRepositoryInterface $userRepository
    ) {
    }

        public function getAnalytics(): UserAnalyticsDTO
    {
        return new UserAnalyticsDTO(
            today: $this->userRepository->getTodayCount(),
            week: $this->userRepository->getThisWeekCount(),
            month: $this->userRepository->getThisMonthCount(),
            total: $this->userRepository->getTotalCount(),
        );
    }
}