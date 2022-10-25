<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imports extends Model
{
    use HasFactory;
    protected $table = 'imports';
    protected $primaryKey = 'i_id';
    protected $fillable = [
        'i_code',
        'i_admin_id',
        'i_total',
        'i_status',
    ];

    public function import_details()
    {
        return $this->hasMany(import_details::class, 'import_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'i_admin_id');
    }
}
