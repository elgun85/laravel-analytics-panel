<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

use function Symfony\Component\Clock\now;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'company',
        'notes',
        'created_at',
        'updated_at',


    ];

    // #Scope
    // public function scopeWeekly(Builder $query): Builder
    // {
    //     return $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
    // }

    public function scopeWeekly(Builder $query): Builder
{
    return $query->whereBetween('created_at', [
        Carbon::now()->startOfYear(),
        Carbon::now()->endOfYear()
    ]);
}
}
