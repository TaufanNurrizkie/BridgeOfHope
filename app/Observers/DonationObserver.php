<?php

namespace App\Observers;

use App\Models\Donation;

class DonationObserver
{
    public function created(Donation $donation)
    {
        if ($donation->payment_status === 'completed') {
            $donation->campaign->increment('collected_amount', $donation->amount);
        }
    }
    
    public function updated(Donation $donation)
    {
        // Jika status pembayaran berubah menjadi 'completed', tambahkan ke collected_amount
        if ($donation->wasChanged('payment_status') && $donation->payment_status === 'completed') {
            $donation->campaign->increment('collected_amount', $donation->amount);
        }
        // Jika status pembayaran sebelumnya 'completed' dan sekarang berubah, kurangi collected_amount
        elseif ($donation->wasChanged('payment_status') && $donation->getOriginal('payment_status') === 'completed') {
            $donation->campaign->decrement('collected_amount', $donation->amount);
        }
    }
    
    public function deleted(Donation $donation)
    {
        // Hanya kurangi jika donasi yang dihapus memiliki status pembayaran 'completed'
        if ($donation->payment_status === 'completed') {
            $donation->campaign->decrement('collected_amount', $donation->amount);
        }
    }
    
}

