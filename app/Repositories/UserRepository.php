<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository implements RepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
    public function getAll()
    {
        return $this->model->get();
    }

    public function changeStatus($id)
    {
        $result = $this->findById($id);
        if ($result) {
            $result->status = !$result->status;
            $result->save();
            return $result;
        }
        return false;
    }
}
