<?php

namespace App\Repositories\Event;

use App\Models\Events;
use App\Repositories\BaseRepository;

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