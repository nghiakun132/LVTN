<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales_products extends Model
{
    use HasFactory;
    protected $table = 'sales_products';
    protected $fillable = ['sale_id', 'product_id'];

    public function sales()
    {
        return $this->belongsTo(sales::class, 'sale_id');
    }
}