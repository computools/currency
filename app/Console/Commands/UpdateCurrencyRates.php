<?php

namespace App\Console\Commands;

use Domain\Services\CurrencyService;
use Illuminate\Console\Command;
use Domain\Services\CurrencyUpdater;

class UpdateCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /**
         * @var CurrencyService $currencyService
         */
        $currencyService = app()->make(CurrencyService::class);
        $currencyService->updateCurrencies();
    }
}
