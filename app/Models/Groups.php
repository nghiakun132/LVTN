<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Groups extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'groups';
    protected $primaryKey = 'group_id';
    protected $fillable = ['name', 'slug', 'active'];

    public function product()
    {
        return $this->hasMany(Product::class, 'group_id');
    }
}
