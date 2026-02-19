<?php
namespace App\DTOs;
class UserAnalyticsDTO
{
    public function __construct(
        public int $today,
        public int $week,
        public int $month,
        public int $total,
    ) {
    }
}