<?php

namespace App\Services;

use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class CustomerService
{

    public function __construct(protected CustomerRepositoryInterface $customerRepository)
    {
        
    }

    public function getCountCustomer(): Builder
    {
        return $this->customerRepository->getCountCustomer();
    }
}
