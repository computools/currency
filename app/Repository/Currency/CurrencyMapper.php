<?php

namespace App\Repository\Currency;

use App\Currency as CurrencyModel;
use Domain\Entities\Currency;
use Illuminate\Database\Eloquent\Collection;

class CurrencyMapper
{
    public function mapCollection(Collection $collection)
    {
        $result = [];
        foreach ($collection as $item) {
            $result[] = $this->mapToEntity($item);
        }
        return $result;
    }

    public function mapToEntity(CurrencyModel $currencyModel): Currency
    {
        $currency = new Currency();
        $currency->id = $currencyModel->id;
        $currency->name = $currencyModel->name;
        $currency->code = $currencyModel->code;
        $currency->rate = $currencyModel->rate;
        return $currency;
    }

    public function mapToModel(Currency $currency): CurrencyModel
    {
        $currencyModel = new CurrencyModel();
        $currencyModel->id = $currency->id;
        $currencyModel->name = $currency->name;
        $currencyModel->rate = $currency->rate;
        $currencyModel->code = $currency->code;
        return $currencyModel;
    }
}
