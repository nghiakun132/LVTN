<?php

namespace App\Repositories;

use App\Models\DeliveryAgent;

class DeliveryRepository extends BaseRepository
{
    public function getModel()
    {
        return DeliveryAgent::class;
    }
}
