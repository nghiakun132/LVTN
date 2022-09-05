<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $table = 'imports';
    protected $primaryKey = 'i_id';
    protected $fillable = [
        'i_product_id',
        'i_price',
        'i_quantity',
        'i_status',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class, 'i_product_id', 'pro_id');
    }
}