<?php

namespace App\Repositories;

use App\Models\Imports;

class ImportRepository extends BaseRepository
{
    public function getModel()
    {
        return Imports::class;
    }

    public function findOne($id)
    {
        return $this->model->where('i_id', $id)->first();
    }

    public function update($data, $id)
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

    public function getWithRelationshipHaveId($relate, $id)
    {
        return $this->model->where('i_id', $id)->with($relate)->get();
    }
}
