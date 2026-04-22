<?php

namespace App\Services;

use App\Models\Dovriyye;
use Illuminate\Support\Facades\DB;


class Dovriyye_analitic
{

    public function __construct()
    {
        //
    }

    public function Dovriyye_analitic()
    {

        return     DB::table('dovriyyes as d2025')

            ->leftJoin('dovriyyes as d2026jan', function ($join) {
                $join->on('d2025.hesab', '=', 'd2026jan.hesab')
                    ->where('d2026jan.ay', 1)
                    ->where('d2026jan.il', 2026);
            })

            ->leftJoin('dovriyyes as d2026mar', function ($join) {
                $join->on('d2025.hesab', '=', 'd2026mar.hesab')
                    ->where('d2026mar.ay', 3)
                    ->where('d2026mar.il', 2026);
            })

            ->select(
                'd2025.hesab',
                'd2025.ad',
                'd2025.maliye_kodu',

                DB::raw("
            CASE 
                WHEN d2025.maliye_kodu IN (100,150)
                THEN 'Büdcə'
                ELSE 'Qeyri büdcə'
            END as maliyye_novu
        "),

                'd2025.giris_saldo as giris_yanvar_2025',

                'd2026jan.giris_saldo as giris_yanvar_2026',

                'd2026mar.giris_saldo as giris_mart_2026',
                'd2026mar.hesablanma as hesablanma_mart_2026',

            )

            ->where('d2025.ay', 1)
            ->where('d2025.il', 2025)

            ->where('d2025.giris_saldo', '<', 0)

            ->get();
    }

    public function Debitor()
    {
        return Dovriyye::query()
            ->selectRaw(
                "
             MAX(id) as id,    
                    hesab,
                    MAX(ad) as ad,
                    CASE 
                WHEN MAX(maliye_kodu) IN (100,150)
                THEN 'Büdcə'
                ELSE 'Qeyri büdcə'
            END as maliyye_novu,


            SUM(CASE WHEN ay=1 AND il=2025 THEN giris_saldo ELSE 0 END) as borc_yanvar_2025,
            SUM(CASE WHEN ay=1 AND il=2026 THEN giris_saldo ELSE 0 END) as borc_yanvar_2026,
            SUM(CASE WHEN ay=3 AND il=2026 THEN hesablanma ELSE 0 END) as hesablanma_mart_2026,
            SUM(CASE WHEN ay=3 AND il=2026 THEN cixis_saldo ELSE 0 END) as cixis_mart_2026
            "
            )
            ->groupBy('hesab')
            ->whereIn('hesab', [1, 18, 20])

            ->orderBy('hesab', 'asc')

        ;
    }
}
