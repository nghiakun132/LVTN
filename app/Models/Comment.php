<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'product_id',
        'star',
        'content',
        'parent_id',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id', 'id');
    }


    public function getDiffedTimeAttribute()
    {
        $now = \Carbon\Carbon::now();
        $diff = $now->diffInYears($this->created_at);
        if ($diff == 0) {
            $diff = $now->diffInMonths($this->created_at);
            if ($diff == 0) {
                $diff = $now->diffInDays($this->created_at);
                if ($diff == 0) {
                    $diff = $now->diffInHours($this->created_at);
                    if ($diff == 0) {
                        $diff = $now->diffInMinutes($this->created_at);
                        if ($diff == 0) {
                            $diff = $now->diffInSeconds($this->created_at);
                            return $diff . ' giây trước';
                        }
                        return $diff . ' phút trước';
                    }
                    return $diff . ' giờ trước';
                }
                return $diff . ' ngày trước';
            }
            return $diff . ' tháng trước';
        }
        return $diff . ' năm trước';
    }
}