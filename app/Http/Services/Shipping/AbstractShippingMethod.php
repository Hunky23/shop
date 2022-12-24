<?php

namespace App\Http\Services\Shipping;

abstract class AbstractShippingMethod
{
    /**
     * @param int $packageWeight Вес посылки
     * @return int Стоимость доставки
     */
    abstract static public function getPrice(int $packageWeight): int;
}
