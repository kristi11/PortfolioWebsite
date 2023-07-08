<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static make(array $array)
 * @method static find($deleteId)
 * @property mixed $user_id
 */
class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name",
        "description",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
