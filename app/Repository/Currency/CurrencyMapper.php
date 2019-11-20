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
        $currency->originalId = $currencyModel->original_id;
        $currency->name = $currencyModel->name;
        $currency->code = $currencyModel->code;
        $currency->rate = $currencyModel->rate;
        $currency->createdAt = $currencyModel->created_at;
        return $currency;
    }

    public function mapToModel(Currency $currency): CurrencyModel
    {
        $currencyModel = new CurrencyModel();
        $currencyModel->original_id = $currency->originalId;
        $currencyModel->id = $currency->id;
        $currencyModel->name = $currency->name;
        $currencyModel->rate = $currency->rate;
        $currencyModel->code = $currency->code;
        return $currencyModel;
    }
}
