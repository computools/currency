<?php

namespace App\Service;

use Domain\Entities\Currency;
use App\Service\CBR\CBRGateway;
use Domain\Contracts\CurrencyProviderInterface;

class CBRService implements CurrencyProviderInterface
{
    private $gateway;

    public function __construct(CBRGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function getCurrenciesList(): array
    {
        $listContentXml = $this->gateway->getList()->getBody()->getContents();

        return $this->transformToArray($listContentXml);
    }

    protected function transformToArray(string $xml): array
    {
        $xmlObject = simplexml_load_string($xml);

        $result = [];
        foreach ($xmlObject->Valute as $currencySource) {
            $result[] = CbrToCurrencyMapper::map($currencySource);
        }

        return $result;
    }

}
