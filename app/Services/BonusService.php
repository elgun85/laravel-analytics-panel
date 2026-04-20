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
        return  Cache::remember('tekrar_nomre_sayi_analizi', now()->addMinutes(60), function () {

            $datam = DB::table('flkarts')
                ->whereIn(DB::raw('(NOTEL)'), function ($q) {
                    $q->selectRaw('NOTEL')
                        ->from('flkarts')
                        ->groupBy('NOTEL')
                        ->havingRaw('COUNT(*) > 1');
                })
                ->orderBy('NOTEL')
                ->limit(100)
                ->get();

            $menzil_say =  DB::table('flkarts')
                ->where('abonent', 1)
                ->where('abonent2', 0)
                ->count();

            $menzil_qurum =  DB::table('flkarts')
                ->where('abonent', 1)
                ->where('abonent2', 2)
                ->count();
            $qurum = DB::table('flkarts')
                ->where('abonent', 2)
                ->count();

            return [
                'menzil_say' => $menzil_say,
                'menzil_qurum' => $menzil_qurum,
                'qurum' => $qurum,
                'datam' => $datam,
            ];
        });
    }
}
