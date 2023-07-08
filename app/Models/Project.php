<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static make(array $array)
 * @method static find(mixed $deleteId)
 * @method static where(string $string, int|string|null $id)
 * @property mixed $user_id
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "name",
        "link",
        "description",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
