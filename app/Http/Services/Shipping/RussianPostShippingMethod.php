<?php

namespace App\Http\Services\Shipping;

class RussianPostShippingMethod extends AbstractShippingMethod
{
    static public function getPrice(int $packageWeight): int
    {
        if ($packageWeight < 10) {
            return 100;
        }

        return 1000;
    }
}
