<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Spin;
use Illuminate\Console\Command;

class DeleteExpiredSpins extends Command
{
    protected $signature = 'spins:delete-expired';
    protected $description = 'Delete spins whose expiration date is today.';

    public function handle()
    {
        $today = Carbon::today();

        // Find all spins where 'expires_at' is in the past (less than today)
        $expiredSpins = Spin::where('expires_at', '<', $today)->get();

        foreach ($expiredSpins as $spin) {
            // Delete the expired spin
            $spin->delete();
            $this->info("Spin for user {$spin->user_id} has been deleted as it expired on {$spin->expires_at->toDateString()}.");
        }

        $this->info('Expired spins deletion process completed.');
    }
}
