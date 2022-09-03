<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Import extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'imports';
    protected $primaryKey = 'i_id';
    protected $fillable = ['supplier_id', 'admin_id', 'i_total', 'i_date', 'i_note', 'i_status', 'confirm_date', 'confirm_by'];

    public function import_detail()
    {
        return $this->hasMany(Import_detail::class, 'import_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}