<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, int|string|null $id)
 * @method static make(array $array)
 * @method static find(mixed $deleteId)
 * @property mixed $user_id
 */
class WhyMe extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
