<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'products';
    protected $primaryKey = 'pro_id';
    protected $fillable = [
        'pro_name',
        'sku',
        'pro_slug',
        'pro_category_id',
        'pro_brand_id',
        'pro_price',
        'pro_sale',
        'pro_quantity',
        'pro_number',
        'pro_description',
        'pro_content',
        'pro_avatar',
        'pro_view',
        'pro_detail',
        'pro_active',
        'pro_hot',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'pro_category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brands::class, 'pro_brand_id');
    }
    public function group()
    {
        return $this->belongsTo(Groups::class, 'group_id');
    }

    public function images()
    {
        return $this->hasMany(Images::class, 'product_id');
    }

    public function sales()
    {
        return $this->hasMany(sales_products::class, 'product_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id');
    }

    public function event_details()
    {
        return $this->hasMany(Event_details::class, 'product_id');
    }
}
