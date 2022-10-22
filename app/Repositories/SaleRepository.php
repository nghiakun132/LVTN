<?php

namespace App\Repositories;

use App\Models\sales;

class SaleRepository extends BaseRepository
{
    public function getModel()
    {
        return sales::class;
    }
}
