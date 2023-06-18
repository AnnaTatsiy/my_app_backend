<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupWorkout extends Model
{
    use HasFactory;

    protected $fillable = [

        'event',
        'cancelled',
        'schedule_id'
    ];

    // сторона "много" отношение "1:М", отношение "принадлежит"
    public function schedule(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
}
