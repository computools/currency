<?php

namespace App\Http\Controllers\Currency;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Domain\Services\CurrencyService;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CurrencyController extends Controller
{
    private $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }

    public function getList(Request $request): JsonResponse
    {
        /**
         * @todo implement pagination with laravel paginator (or improve the current implementation)
         */
        return response()->json(
            $this->currencyService->getCurrencyListSlice(
                (int) $request->get('take', 20),
                (int) $request->get('skip', 0)
            )
        );
    }

    public function getCurrencyRate(string $code): JsonResponse
    {
        if (!$currency = $this->currencyService->getCurrencyById($code)) {
            throw new NotFoundHttpException();
        }
        return response()->json(
            $this->currencyService->getCurrencyById($code)
        );
    }

    public function getHistory(string $code): JsonResponse
    {
        return response()->json(
            $this->currencyService->getHistoricalData($code)
        );
    }
}
