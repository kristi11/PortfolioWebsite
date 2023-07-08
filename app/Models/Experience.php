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
class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "position",
        "company",
        "link",
        "type",
        "location",
        "description",
        "month_start",
        "year_start",
        "month_end",
        "year_end",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
