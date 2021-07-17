<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static paginate()
 * @method static create(array $validated)
 * @method static find(int $id)
 */
class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'name'
    ];

    public function worker(): BelongsToMany
    {
        return $this->belongsToMany(Worker::class);
    }
}
