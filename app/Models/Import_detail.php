<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Import_detail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'import_details';
    protected $primaryKey = 'id';
    protected $fillable = ['import_id', 'product_id', 'quantity', 'price'];

    public function import()
    {
        return $this->belongsTo(Import::class, 'import_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}