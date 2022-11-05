<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $fillable = [
        'path',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id');
    }
}
