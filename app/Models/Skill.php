<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    /**
     * @method static where(string $string, $id)
     * @method static make(array $array)
     * @method static search(string $string, mixed $search)
     * @method static find($id)
     * @method static whereKey(mixed $selected)
     * @method attach($id)
     * @property mixed $user_id
     * @property mixed $id
     */
    class Skill extends Model
    {
        use HasFactory;

        protected $fillable = ["name", "user_id", "years"];

        // Cast the 'years' field to an integer
        protected $casts = [
            "years" => "integer",
        ];

//            public function user(): BelongsTo
//            {
//                return $this->belongsTo(User::class);
//            }
        public function user(): BelongsToMany
        {
            return $this->belongsToMany(User::class)->withTimestamps();
        }
    }
