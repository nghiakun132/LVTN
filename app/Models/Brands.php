<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'brands';
    protected $primaryKey = 'b_id';
    protected $fillable = ['b_name', 'b_category_id', 'b_slug', 'b_banner'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'b_category_id');
    }
}