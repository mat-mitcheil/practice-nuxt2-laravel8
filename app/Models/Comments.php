<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', // Include post_id in fillable
        'user_id', // Include user_id in fillable
        'comment',
    ];

    // Relations to othe Models
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function posts()
    {
        return $this->belongsTo(Posts::class);
    }
}
