<?php
namespace App\DTOs;

use Illuminate\Support\Collection;

class UserAnalyticsDTO
{
    public function __construct(
        public int $today,
        public int $week,
        public int $month,
        public int $total,
        public Collection $monthly,
        public int $tarix

    ) {
    }
}