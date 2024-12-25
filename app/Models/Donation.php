<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['campaign_id', 'user_id', 'amount', 'payment_status', 'payment_method', 'transaction_id'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    protected static function booted()
    {
        static::created(function ($donation) {
            $donation->campaign->increment('collected_amount', $donation->amount);
        });

        static::deleted(function ($donation) {
            $donation->campaign->decrement('collected_amount', $donation->amount);
        });
    }
}



