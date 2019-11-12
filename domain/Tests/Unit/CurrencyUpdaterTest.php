<?php

namespace Domain\Tests\Unit;

use Domain\Tests\BaseTest;
use Domain\Entities\Currency;
use Domain\Services\CurrencyUpdater;
use Domain\Contracts\CurrencyProviderInterface;
use Domain\Contracts\CurrencyRepositoryInterface;

class CurrencyUpdaterTest extends BaseTest
{
    public function testPerformUpdateExisted()
    {
        $sourceCurrency = new Currency();
        $sourceCurrency->id = 'test';

        $currencyProviderMock = $this->createMock(CurrencyProviderInterface::class);
        $currencyProviderMock->expects(
            $this->once()
        )->method('getCurrenciesList')->willReturn([$sourceCurrency]);

        $currencyRepositoryMock = $this->createMock(CurrencyRepositoryInterface::class);
        $currencyRepositoryMock->expects(
            $this->once()
        )->method('findById')->willReturn(
            new Currency()
        );
        $currencyRepositoryMock->expects(
            $this->never()
        )->method('create')->willReturn(new Currency());

        $currencyRepositoryMock->expects(
            $this->once()
        )->method('update')->willReturn(new Currency());

        $currencyUpdater = new CurrencyUpdater($currencyRepositoryMock, $currencyProviderMock);
        $currencyUpdater->performUpdate();
    }

    public function testPerformUpdateNewOne()
    {
        $sourceCurrency = new Currency();
        $sourceCurrency->id = 'test';

        $currencyProviderMock = $this->createMock(CurrencyProviderInterface::class);
        $currencyProviderMock->expects(
            $this->once()
        )->method('getCurrenciesList')->willReturn([$sourceCurrency]);

        $currencyRepositoryMock = $this->createMock(CurrencyRepositoryInterface::class);
        $currencyRepositoryMock->expects(
            $this->once()
        )->method('findById')->willReturn(
            null
        );
        $currencyRepositoryMock->expects(
            $this->once()
        )->method('create')->willReturn(new Currency());

        $currencyRepositoryMock->expects(
            $this->never()
        )->method('update')->willReturn(new Currency());

        $currencyUpdater = new CurrencyUpdater($currencyRepositoryMock, $currencyProviderMock);
        $currencyUpdater->performUpdate();
    }

    public function testPerformUpdateMultipleRates()
    {
        $sourceCurrency = new Currency();
        $sourceCurrency->id = 'test';

        $currencyProviderMock = $this->createMock(CurrencyProviderInterface::class);
        $currencyProviderMock->expects(
            $this->once()
        )->method('getCurrenciesList')->willReturn([$sourceCurrency, $sourceCurrency]);

        $currencyRepositoryMock = $this->createMock(CurrencyRepositoryInterface::class);
        $currencyRepositoryMock->expects(
            $this->atLeast(2)
        )->method('findById')->willReturn(
            null
        );
        $currencyRepositoryMock->expects(
            $this->atLeast(2)
        )->method('create')->willReturn(new Currency());

        $currencyRepositoryMock->expects(
            $this->never()
        )->method('update')->willReturn(new Currency());

        $currencyUpdater = new CurrencyUpdater($currencyRepositoryMock, $currencyProviderMock);
        $currencyUpdater->performUpdate();
    }
}
