<?php

namespace Domain\Services;

use Domain\Contracts\CurrencyRepositoryInterface;
use Domain\Entities\Currency;

class CurrencyService
{
    private $currencyRepository;
    private $currencyUpdater;

    public function __construct(
        CurrencyRepositoryInterface $currencyRepository,
        CurrencyUpdater $currencyUpdater
    ) {
        $this->currencyRepository = $currencyRepository;
        $this->currencyUpdater = $currencyUpdater;
    }

    /**
     * @param int $take
     * @param int $skip
     *
     * @return Currency[]
     */
    public function getCurrencyListSlice(int $take, int $skip): array
    {
        return $this->currencyRepository->getSlice($take, $skip);
    }

    public function getCurrencyById(string $id): ?Currency
    {
        return $this->currencyRepository->findById($id);
    }

    public function getHistoricalData(string $code)
    {
        return $this->currencyRepository->findByCode($code);
    }

    public function updateCurrencies(): void
    {
        $this->currencyUpdater->performUpdate();
    }
}
