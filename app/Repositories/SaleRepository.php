<?php

namespace App\Repositories;

use App\Models\sales;

class SaleRepository extends BaseRepository
{
    public function getModel()
    {
        return sales::class;
    }

    public function findWithRelationship(array $with, $id)
    {
        return $this->model->with($with)->where('id', $id)->first();
    }
}
