<?php

namespace App\Providers;

use App\Service\CBRService;
use Illuminate\Support\ServiceProvider;
use App\Repository\Currency\CurrencyRepository;
use Domain\Contracts\CurrencyProviderInterface;
use Domain\Contracts\CurrencyRepositoryInterface;

class CurrencyServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(CurrencyProviderInterface::class, CBRService::class);
    }
}
