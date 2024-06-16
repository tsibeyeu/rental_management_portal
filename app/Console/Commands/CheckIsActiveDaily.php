<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MemberTrainingPackage;

class CheckIsActiveDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-is-active-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        try {
            $updatedCount = MemberTrainingPackage::where('expire_date', '<', now())->update(['is_active' => false]);
            $this->info($updatedCount . ' member statuses updated successfully.');
        } catch (\Exception $e) {
            $this->error('An error occurred while updating member statuses: ' . $e->getMessage());
        }
    }
}
