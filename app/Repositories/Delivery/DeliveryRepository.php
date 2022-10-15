<?php

namespace App\Repositories\Delivery;

use App\Models\DeliveryAgent;
use App\Repositories\BaseRepository;

class DeliveryRepository extends BaseRepository
{
    public function getModel()
    {
        return DeliveryAgent::class;
    }
}
