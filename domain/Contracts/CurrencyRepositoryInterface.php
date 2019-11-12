<?php

namespace Domain\Contracts;

use Domain\Entities\Currency;

interface CurrencyRepositoryInterface
{
    public function getSlice(int $take, int $skip): array;
    public function findById(string $id): ?Currency;
    public function create(Currency $currency): Currency;
    public function update(Currency $currency): Currency;
}
