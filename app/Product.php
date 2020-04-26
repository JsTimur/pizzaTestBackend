<?php

namespace App;

use App\Http\Services\PriceService;
use App\Scopes\IsActive;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new IsActive);
    }

    /**
     * @param $value
     * @return UrlGenerator|string
     */
    public function getImageAttribute($value) {
        return url('img/'.$value);
    }

    /**
     * @param $value
     * @return array
     */
    public function getPriceAttribute($value) {
        $priceService = new PriceService();
        return $priceService->getAllCurrenciesPrices($value);
    }
}
