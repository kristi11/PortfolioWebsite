<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Support\HigherOrderCollectionProxy;

    /**
     * @property mixed $user_id
     * @property mixed $file
     * @property HigherOrderCollectionProxy|mixed $resume
     * @method static where(string $string, int|string|null $id)
     * @method static findOrFail($resumeId)
     * @method static find($deleteId)
     */
    class Resume extends Model
    {
        use HasFactory;

        protected $fillable = ["user_id", "resume", "resumeLink"];

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
    }
