<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['c_name', 'c_slug', 'c_description'];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}