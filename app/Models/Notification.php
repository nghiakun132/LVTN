<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
        'is_admin',
        'user_id',
        'type',
        'message',
        'is_read',
    ];

    public function user()
    {
        if ($this->is_admin) {
            return $this->belongsTo(Admin::class);
        } else {
            return $this->belongsTo(User::class);
        }
    }
}
