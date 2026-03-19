<?php
namespace App\DTOs;

use Illuminate\Database\Eloquent\Builder;

class AnalyseDTO 
{
    public function __construct(
      public Builder $flkart,        
    ) {
    }
}