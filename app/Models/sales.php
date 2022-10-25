<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sales extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sales';
    protected $fillable = ['s_name', 's_active'];

    public function sale()
    {
        return $this->hasMany(sales_products::class, 'sale_id');
    }

}
