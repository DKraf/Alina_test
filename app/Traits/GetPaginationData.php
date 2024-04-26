<?php

/**
 * @author RedHead_DEV = [Kravchenko Dmitriy => dkraf9006@gmail.com]
 */

namespace App\Traits;


Trait GetPaginationData
{
    public function getPaginateValue($inData): array
    {
        return array(
            'total'    => $inData->total(),
            'per_page' => $inData->perPage(),
            'current_page' => $inData->currentPage(),
            'last_page'    => $inData->lastPage(),
        );
    }

}
