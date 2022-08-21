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
    protected $fillable = ['c_name', 'parent_id', 'c_slug', 'c_banner', 'c_status'];
}