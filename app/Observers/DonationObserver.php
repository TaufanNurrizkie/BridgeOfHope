<?php

namespace App\Observers;

use App\Models\Donation;

class DonationObserver
{
    public function created(Donation $donation)
    {
        // Update collected_amount di tabel campaigns
        $donation->campaign->increment('collected_amount', $donation->amount);
    }

    public function deleted(Donation $donation)
    {
        // Kurangi collected_amount jika donasi dihapus
        $donation->campaign->decrement('collected_amount', $donation->amount);
    }
}

