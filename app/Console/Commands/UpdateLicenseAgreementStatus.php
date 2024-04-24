<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\LicenseAgreement;

class UpdateLicenseAgreementStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-license-agreement-status';

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
        LicenseAgreement::where('expire_date', '<', now())->update(['license_status' => false]);
        $this->info('LicenseAgreement statuses updated successfully.');
    }
}
