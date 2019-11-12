<?php

namespace Domain\Contracts;

use Domain\Entities\Currency;

interface CurrencyProviderInterface
{
    /**
     * @return Currency[]
     */
    public function getCurrenciesList(): array;
}
