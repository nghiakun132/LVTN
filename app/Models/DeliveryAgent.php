<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeliveryAgent extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'delivery_agents';
    protected $fillable = [
        'name',
        'code',
        'fee',
    ];

    public function getTimeDelivery()
    {
        return Carbon::parse($this->created_at)->addDays(3)->format('d/m/Y');
    }
}
