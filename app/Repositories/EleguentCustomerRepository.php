<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;

class EleguentCustomerRepository implements CustomerRepositoryInterface
{

    public function getCountCustomer(): Builder
    {
        return Customer::query();
    }
}
