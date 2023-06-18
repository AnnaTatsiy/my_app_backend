<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [

        'day_id',
        'gym_id',
        'time_begin',
        'time_end',
        'coach_id',
        'workout_type_id'

    ];

    // сторона "один" отношения "1:М" - отношение "имеет"
    public function group_workout():HasMany {
        return $this->hasMany(GroupWorkout::class);
    }

    // сторона "много" отношение "1:М", отношение "принадлежит"
    public function day(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Day::class);
    }

    public function gym(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Gym::class);
    }

    public function coach(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Coach::class);
    }

    public function workout_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(WorkoutType::class);
    }
}
