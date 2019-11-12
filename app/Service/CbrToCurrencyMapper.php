<?php

namespace App\Service;

use Domain\Entities\Currency;

class CbrToCurrencyMapper
{
    public static function map(\SimpleXMLElement $xml): Currency
    {
        $currency = new Currency();
        $currency->id = (string) $xml->NumCode;
        $currency->name = (string) $xml->Name;
        $currency->rate = self::convertRate($xml->Value);
        $currency->code = (string) $xml->CharCode;

        return $currency;
    }

    protected static function convertRate(string $rate): float
    {
        return (float) str_replace(',', '.', $rate);
    }
}
