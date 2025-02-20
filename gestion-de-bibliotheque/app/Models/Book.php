<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = ['title', 'cover_url', 'user_id', 'author', 'status'];

    public function Author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isReserved(): bool
    {
        return $this->status === 'reserved';
    }
}
