<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'user_id',
        'amount',
        'payment_status',
        'payment_method',
        'transaction_id',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }


    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::created(function ($donation) {
            // Hanya tambahkan ke collected_amount jika statusnya 'completed' saat dibuat
            if ($donation->payment_status == 'completed') {
                $donation->campaign->increment('collected_amount', $donation->amount);
            }
        });
    
        static::updated(function ($donation) {
            // Periksa jika status payment diubah menjadi 'completed'
            if ($donation->isDirty('payment_status') && $donation->payment_status == 'completed') {
                $donation->campaign->increment('collected_amount', $donation->amount);
            }
        });
    
        static::deleted(function ($donation) {
            // Jika donasi dihapus, kurangi collected_amount dari campaign
            $donation->campaign->decrement('collected_amount', $donation->amount);
        });
    }
    
}



