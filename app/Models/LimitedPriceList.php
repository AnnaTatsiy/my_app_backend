<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitedPriceList extends Model
{
    use HasFactory;

    protected $fillable = [

        'coach_id',
        'amount_workout',
        'price'
    ];

    // сторона "много" отношение "1:М", отношение "принадлежит"
    public function coach(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }
}
