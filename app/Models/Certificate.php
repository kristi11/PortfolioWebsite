<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    /**
     * @property mixed $user_id
     * @method static make(array $array)
     * @method static where(string $string, int|string|null $id)
     * @method static find(mixed $deleteId)
     */
    class Certificate extends Model
    {
        use HasFactory;

        protected $fillable = [
            "user_id",
            "name",
            "organization",
            "credentialID",
            "credentialURL",
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
