<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_details extends Model
{
    use HasFactory;
    protected $table = 'event_details';
    protected $fillable = [
        'event_id',
        'product_id',
        'percentage',
    ];
    public function events()
    {
        return $this->belongsTo(Events::class, 'event_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'pro_id');
    }
}