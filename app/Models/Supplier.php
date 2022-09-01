<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'suppliers';
    protected $primaryKey = 's_id';
    protected $fillable = ['s_name', 's_address', 's_phone', 's_email', 's_status'];

    public function import()
    {
        return $this->hasMany(Import::class, 'supplier_id');
    }
}