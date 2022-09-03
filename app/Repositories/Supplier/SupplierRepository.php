<?php

namespace App\Repositories\Supplier;

use App\Models\Supplier;
use App\Repositories\BaseRepository;

class SupplierRepository extends BaseRepository
{
    public function getModel()
    {
        return Supplier::class;
    }

    public function findOne($id)
    {
        return $this->model->where('s_id', $id)->first();
    }

    public function update($data = [], $id)
    {
        $result = $this->findOne($id);
        if ($result) {
            $result->update($data);
            return true;
        }

        return false;
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
}