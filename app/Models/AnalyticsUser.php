<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsUser extends Model
{
    protected $fillable = [
        'date',
        'daily_count',
        'weekly_count',
        'monthly_count',
        'total_count',
    ];
}
