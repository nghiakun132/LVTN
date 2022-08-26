<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function getModel()
    {
        return Product::class;
    }

    public function findOne($id)
    {
        return $this->model->where('pro_id', $id)->first();
    }

    public function findOneWithRelationship($relationship, $id)
    {
        return $this->model->where('pro_id', $id)->with($relationship)->first();
    }
}