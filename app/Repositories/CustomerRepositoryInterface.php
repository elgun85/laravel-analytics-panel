<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

interface CustomerRepositoryInterface
{

public function getCountCustomer(): Builder;

}



