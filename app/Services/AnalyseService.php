<?php

namespace App\Services;

use App\DTOs\AnalyseDTO;
use App\Interface\AnalyseInterface;
use App\Models\Flkart;
//use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;


class AnalyseService
{


    public function __construct(
        protected AnalyseInterface $analyse
    ) {}

    /* 
    public function getDashboardData(): AnalyseDTO {
        return new AnalyseDTO(
            flkart: $this->analyse->analyse()
        );
    }
     */


    public function getComprehensiveReportQuery()
    {
        $otherData = DB::table('flkartxes as B')
            ->join('flkarts as A', 'B.NOTEL', '=', 'A.NOTEL')
            ->leftJoin('lsqurums as C', 'A.KODQURUM', '=', 'C.KODQURUM')
            ->select([
                'A.NOTEL',
                'A.KODQURUM',
                'A.ABONENT',
                'B.KODTARIF',
                'B.SUMMA',
                'C.KATEQOR'
            ]);
        $mainData = DB::table('flkarts as A')
            ->leftJoin('lsqurums as C', 'A.KODQURUM', '=', 'C.KODQURUM')
            ->select([
                'A.NOTEL',
                'A.KODQURUM',
                'A.ABONENT',
                'A.KODTARIF',
                'A.SUMMA0 as SUMMA',
                'C.KATEQOR',
            ])
            ->unionAll($otherData);

        $subQuery = DB::table(DB::raw("({$mainData->toSql()}) as T1"))
            ->mergeBindings($mainData)
            ->selectRaw('T1.*,
  CASE WHEN T1.abonent IN (1, 8) THEN "MENZIL" ELSE "IDERE" END AS categoriya,
            CASE 
                WHEN T1.KODTARIF IN (707, 708) THEN "1.1 GPON"
                WHEN T1.KODTARIF IN (1, 2) THEN "1.2 Mis"
                -- ... digər case-lər
                ELSE "basqa" 
            END AS xidmetin_novu
  ');

$finalQuery= DB::table(DB::raw("({$subQuery->toSql()}) as T2"))
            ->mergeBindings($subQuery)
            ->selectRaw('
            CASE 
                WHEN T2.xidmetin_novu IN ("1.1 GPON", "1.2 Mis") THEN "1.0 Telefon xidmətləri"
                ELSE "Sair xidmət başlıq"
            END AS bashliq,
            SUM(CASE WHEN T2.categoriya = "MENZIL" THEN 1 ELSE 0 END) as menzil_say,
            SUM(CASE WHEN T2.categoriya = "MENZIL" THEN T2.SUMMA ELSE 0 END) as menzil_summa,
            SUM(T2.SUMMA) as cemi_hesab
            ')
          //  ->groupBy('bashliq')
           // ->groupBy(DB::raw('xidmetin_novu WITH ROLLUP'));
            ->groupByRaw('bashliq, xidmetin_novu WITH ROLLUP');

           // return Flkart::query()->setQuery($finalQuery)->reorder(null);
            DB::query()->fromSub($finalQuery, 'T2')->reorder(null);

    }
}
