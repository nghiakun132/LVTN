<?php

namespace App\Repositories;

use App\Models\Brands;
use App\Repositories\BaseRepository;

class BrandRepository extends BaseRepository
{
    public function getModel()
    {
        return Brands::class;
    }

    public function findOne($id)
    {
        return $this->model->where('b_id', $id)->first();
    }

    public function delete($id)
    {
        $result = $this->findOne($id);
        if ($result) {
            $result->delete();

            return true;
        }
        return false;
    }

    public function getBrand($attribute)
    {
        return $this->model->where($attribute)->get();
    }
}
