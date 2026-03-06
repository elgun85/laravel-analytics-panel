<?php

namespace App\DTOs;

use Illuminate\Database\Eloquent\Builder;

class CustomerAnalyticsDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public Builder $countCustomer
    ) {}
}
