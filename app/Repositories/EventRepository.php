<?php

namespace App\Repositories;

use App\Models\Events;

class EventRepository extends BaseRepository
{
    public function getModel()
    {
        return Events::class;
    }

    public function getFirstWithRelationship($relationship = [], $id)
    {
        return $this->model->with($relationship)->find($id);
    }
}
