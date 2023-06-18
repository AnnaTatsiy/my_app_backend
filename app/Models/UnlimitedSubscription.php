<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnlimitedSubscription extends Model
{
    use HasFactory;

    protected $fillable = [

        'customer_id',
        'unlimited_price_list_id',
        'open'

    ];

    // сторона "много" отношение "1:М", отношение "принадлежит"
    public function customer(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function unlimited_price_list(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UnlimitedPriceList::class);
    }
}
