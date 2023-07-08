<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, int|string|null $id)
 * @method static find(mixed $deleteId)
 * @method static make(array $array)
 * @property mixed $user_id
 */
class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "school",
        "link",
        "country",
        "degree",
        "field",
        "month_started",
        "year_started",
        "month_ended",
        "year_ended",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
