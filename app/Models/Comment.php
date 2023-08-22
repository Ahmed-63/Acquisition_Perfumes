<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'message',
    ];
    
    use HasFactory;
    public function user(): BelongsTo         
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): BelongsTo         
    {
        return $this->belongsTo(Post::class);
    }
}
