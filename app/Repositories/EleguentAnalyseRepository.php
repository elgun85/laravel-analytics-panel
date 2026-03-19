<?php

namespace App\Repositories;

use App\Interface\AnalyseInterface;
use App\Models\Flkartx;
use Illuminate\Database\Eloquent\Builder;

class EleguentAnalyseRepository implements AnalyseInterface
{










    /* 
    public function analyse(): Builder
    {

        return $r = Flkartx::query()
            ->from('flkartxes as B')
            ->join('flkarts as A', 'B.NOTEL', '=', 'A.NOTEL')
            ->leftJoin('lsqurums as C', 'A.KODQURUM', '=', 'C.KODQURUM')
            ->selectRaw('
            A.id,
            B.NOTEL,
            A.KODQURUM,
            A.ABONENT,
            B.KODTARIF

        ')

           ->whereIN('A.abonent', [1, 2])
            ->orderBy('A.id')
            ->limit(10)
            ->toSql();       
    }

 */

    
}
