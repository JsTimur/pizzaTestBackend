<?php


namespace App\Http\Services;

use App\Currency;

class PriceService
{

    /**
     * @var \Illuminate\Database\Eloquent\Collection|static[]
     */
    private $currencies;

    public function __construct()
    {
        $this->currencies = Currency::all();
    }

    /**
     * Get prices in all possible currencies price for product by it's price
     * @param float $itemPrice
     * @return array
     */
    public function getAllCurrenciesPrices(float $itemPrice = 0): array
    {
        $resultArray = [];
        foreach ($this->currencies as $currency) {
            $resultArray[] = [
                'name' => $currency['name'],
                'value' => round($itemPrice * $currency['ratio'], 2),
                'sign' => $currency['sign']
            ];
        }

        return $resultArray;
    }
}
