<?php

namespace App\Models;

class CafeProduct extends NormalProduct 
{

    private String $name = "Café";

    /**
     * The 'quality' property decrements twice as much as a normal product
     *
     * @return void
     **/
    protected function decrementQuality(int $quantity) : void
    {
        $this->quality = $this->quality - 2 * $quantity;
    }

}