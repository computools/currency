<?php

namespace App\Repository\Currency;

use Domain\Entities\Currency;
use App\Currency as CurrencyModel;
use Domain\Contracts\CurrencyRepositoryInterface;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    private $currencyMapper;

    public function __construct(CurrencyMapper $currencyMapper)
    {
        $this->currencyMapper = $currencyMapper;
    }

    public function getSlice(int $take, int $skip): array
    {
        return $this->currencyMapper->mapCollection(
            CurrencyModel::take($take)->skip($skip)->get()
        );
    }

    public function create(Currency $currency): Currency
    {
        $currencyModel = $this->currencyMapper->mapToModel($currency);
        $currencyModel->save();
        return $this->currencyMapper->mapToEntity(
            $currencyModel
        );
    }

    public function findById(string $id): ?Currency
    {
        if (!$currencyModel = CurrencyModel::where('id', $id)->first()) {
            return null;
        }
        return $this->currencyMapper->mapToEntity($currencyModel);
    }

    public function update(Currency $currency): Currency
    {
        $currencyModel = CurrencyModel::where('id', $currency->id)->firstOrFail();

        $currencyModel->update([
            'name' => $currency->name,
            'rate' => $currency->rate,
            'code' => $currency->code
        ]);
        return $this->currencyMapper->mapToEntity($currencyModel);
    }
}
