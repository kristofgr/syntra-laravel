<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'plate',
        'photo'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
