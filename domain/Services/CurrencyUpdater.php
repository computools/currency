<?php

namespace Domain\Services;

use Domain\Contracts\CurrencyProviderInterface;
use Domain\Contracts\CurrencyRepositoryInterface;

class CurrencyUpdater
{
    private $currencyRepository;
    private $currencyProvider;

    public function __construct(
        CurrencyRepositoryInterface $currencyRepository,
        CurrencyProviderInterface $currencyProvider
    ) {
        $this->currencyRepository = $currencyRepository;
        $this->currencyProvider = $currencyProvider;
    }

    public function performUpdate()
    {
        $currencies = $this->currencyProvider->getCurrenciesList();

        foreach ($currencies as $currency) {
                $this->currencyRepository->create($currency);
        }
    }
}
