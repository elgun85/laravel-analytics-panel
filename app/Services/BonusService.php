<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class BonusService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function tekrar_nomre_sayi()
    {
        return  Cache::remember('tekrar_nomre_sayi', now()->addMinutes(60), function () {
            return DB::table('flkarts')
                ->selectRaw('notel, COUNT(*) as count')
                ->groupBy('notel')
                ->having('count', '>', 1)
                ->limit(100)
                ->get();
        });
    }

    public function tekrar_nomre_sayi_analizi()
    {

/*         return DB::table('flkarts')
            ->whereIn(DB::raw('(NOTEL)'), function ($q) {
                $q->selectRaw('NOTEL')
                    ->from('flkarts')
                    ->groupBy('NOTEL')
                    ->havingRaw('COUNT(*) > 1');
            })
            ->orderBy('NOTEL')
            ->limit(100)
            ->get(); */

             $a= DB::table('flkarts')
            ->where('kodqurum',2014)
            ->where('abonent',2)
            ->orderBy('summa', 'desc')
            ->limit(50)
            ->get();

            $menzil_say=  DB::table('flkarts')
            ->where('abonent',1)
            ->count();
            $qurum= DB::table('flkarts')
            ->where('abonent',2)
            ->count();

            return [
                'menzil_say' => $menzil_say,
                'qurum' => $qurum,
                'a' => $a
            ];
    }
    
}
