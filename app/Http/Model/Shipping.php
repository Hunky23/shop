<?php

namespace App\Http\Model;

use App\Http\Services\Shipping\DHLShippingMethod;
use App\Http\Services\Shipping\RussianPostShippingMethod;

class Shipping
{
    private int $packageWeight;

    private string $name;

    private ?int $price;

    /*
     * @param int $packageWeight Вес посылки
     */
    public function __construct($packageWeight, $name)
    {
        $this->packageWeight = $packageWeight;

        $this->name = $name;

        $this->setPrice($packageWeight, $name);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPackageWeight(): int
    {
        return $this->packageWeight;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    private function setPrice(int $packageWeight, string $name): self
    {
        if ($name == 'russianPost') {
            $this->price = RussianPostShippingMethod::getPrice($packageWeight);
        } elseif ($name == 'dhl') {
            $this->price = DHLShippingMethod::getPrice($packageWeight);
        } else {
            $this->price = null;
        }

        return $this;
    }
}
