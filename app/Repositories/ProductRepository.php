<?php

namespace App\Repositories;

use App\Models\Product;

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

    public function insertGetId($data = [])
    {
        $product = $this->model->create($data);
        return $product->pro_id;
    }

    public function update($data = [], $id)
    {
        return $this->model->where('pro_id', $id)->update($data);
    }

    public function getAll()
    {
        return $this->model->where('pro_active', 1)->get();
    }

    public function findWhereIn($column, $data = [])
    {
        return $this->model->whereIn($column, $data)->get();
    }

    public function whereNotIn($column, $data = [])
    {
        return $this->model->whereNotIn($column, $data)->get();
    }
}
