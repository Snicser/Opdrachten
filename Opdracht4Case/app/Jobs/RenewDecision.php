<?php

namespace App\Jobs;

use App\Models\Decision;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RenewDecision implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Decision $decision;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Decision $decision)
    {
        $this->decision = $decision;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $actives = $this->decision->newQuery()
            ->where('active_decisions', '=', 1)
            ->whereDate('active_until', '>=', Carbon::today())
            ->get();

        // I think this is not the best way, and it could be better
        // because if you have 1000 queries this would be slow
        foreach ($actives as $active) {
            $active->newQuery()->update([
                'total_km_available' => 100,
                'start_date' => Carbon::now(),
                'active_until' => Carbon::now()->addYear()
            ]);
        }

        // Dispatch or queue the job somewhere/ schedule it to run every day
    }
}
