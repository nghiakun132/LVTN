<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected $primaryKey = 'c_id';
    protected $fillable = ['c_name', 'parent_id', 'c_slug', 'c_banner', 'c_status', 'c_icon'];

    public function parent()
    {
        return $this->hasMany(Category::class, 'parent_id', 'c_id');
    }

    public function brand()
    {
        return $this->hasMany(Brands::class, 'b_category_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'pro_category_id');
    }
}
