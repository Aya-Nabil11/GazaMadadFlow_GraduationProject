<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Citizen;
use App\Services\GoogleSheet;
use App\Jobs\SyncCitizenToGoogleSheet;

class PushToGoogleSheet extends Command
{
    protected $signature = 'sheet:sync';
    protected $description = 'Push citizens directly to Google Sheet';

    public function handle()
    {
        (new SyncCitizenToGoogleSheet())->handle();
        $this->info('Citizens synced to Google Sheet.');
    }

}
