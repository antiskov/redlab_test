<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static paginate()
 */
class Department extends Model
{
    use HasFactory, SoftDeletes;

    public function worker(): BelongsToMany
    {
        return $this->belongsToMany(Worker::class);
    }
}
