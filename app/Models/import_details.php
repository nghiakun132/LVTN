<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import_details extends Model
{
    use HasFactory;
    protected $table = 'import_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'import_id',
        'product_id',
        'quantity',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function import()
    {
        return $this->belongsTo(Imports::class, 'import_id');
    }
}
