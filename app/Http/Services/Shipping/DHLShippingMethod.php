<?php

namespace App\Http\Services\Shipping;

class DHLShippingMethod extends AbstractShippingMethod
{
    static public function getPrice(int $packageWeight): int
    {
        return $packageWeight * 100;
    }
}
