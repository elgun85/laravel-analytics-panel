<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dovriyye extends Model
{
    protected $appends = [
    'maliyye_novu',
    'borc_yanvar_2025',
    'borc_yanvar_2026',
    'hesablanma_mart_2026',
    'cixis_mart_2026'
];
}
