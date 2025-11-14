<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\XeroService;

class SyncXeroCommand extends Command
{
    protected $signature = 'xero:sync';
    protected $description = 'Synchronize invoices and transactions between Xero and Laravel';

    public function handle(XeroService $xero)
    {
        $this->info('Starting Xero sync...');
        // call your service here
        $xero->syncInvoicesFromXero();
        $this->info('✅ Sync complete');
    }
}
