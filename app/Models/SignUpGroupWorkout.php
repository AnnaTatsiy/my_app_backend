<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignUpGroupWorkout extends Model
{
    use HasFactory;

    protected $fillable = [

        'customer_id',
        'group_workout_id'

    ];

    // сторона "много" отношение "1:М", отношение "принадлежит"
    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function group_workout(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GroupWorkout::class);
    }
}
