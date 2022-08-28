<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colors extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'colors';
    protected $primaryKey = 'color_id';
    protected $fillable = ['color', 'active'];
}