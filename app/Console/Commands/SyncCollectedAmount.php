<?php

namespace App\Console\Commands;

use App\Models\Campaign;
use Illuminate\Console\Command;

class SyncCollectedAmount extends Command
{
    protected $signature = 'sync:collected-amount';
    protected $description = 'Sync collected_amount in campaigns with donations';

    public function handle()
    {
        $campaigns = Campaign::all();

        foreach ($campaigns as $campaign) {
            $collected = $campaign->donations()->where('payment_status', 'completed')->sum('amount');
            $campaign->update(['collected_amount' => $collected]);
        }

        $this->info('Collected amounts synchronized successfully.');
    }

}
