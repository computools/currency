<?php

namespace App\Service\CBR;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class CBRGateway
{
    private $url = 'http://www.cbr.ru/scripts/XML_daily.asp';

    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getList(): ?ResponseInterface
    {
        try {
            $response = $this->client->get($this->url);
        } catch (\Exception $exception) {
            return false;
        }
        return $response;
    }
}