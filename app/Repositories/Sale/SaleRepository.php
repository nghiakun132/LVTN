<?php

namespace App\Repositories\Sale;

use App\Models\sales;
use App\Repositories\BaseRepository;

class SaleRepository extends BaseRepository
{
    public function getModel()
    {
        return sales::class;
    }
}