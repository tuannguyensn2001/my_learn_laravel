<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($id)
 * @method static privateCode(mixed $private_code)
 * @method static create(array $classroom)
 */
class Classroom extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'classroom_user', 'classroom_id', 'user_id')->withTimestamps()->withPivot('role', 'status');
    }

    public function scopePrivateCode($query,$code)
    {
        return $query->where('private_code',$code);
    }
}
