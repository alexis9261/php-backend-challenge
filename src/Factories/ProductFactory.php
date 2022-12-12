<?php

namespace App\Factories;

use App\Contracts\ProductInterface;
use App\Models\PiscoProduct;
use App\Models\TumiProduct;
use App\Models\TicketProduct;
use App\Models\CafeProduct;
use App\Models\NormalProduct;

class ProductFactory {

    /**
     * Static method to create a new Product instance
     *
     * @param String $name name of the class
     * @return ProductInterface
     **/
    public static function create(string $name, int $quality, int $sellIn) : ProductInterface
    {
        if($name === 'normal')
            return new NormalProduct($quality, $sellIn);
        if($name === 'Pisco Peruano')
            return new PiscoProduct($quality, $sellIn);
        if($name === 'Tumi')
            return new TumiProduct($quality, $sellIn);
        if($name === 'Ticket VIP al concierto de Pick Floid')
            return new TicketProduct($quality, $sellIn);
        if($name === 'Producto de Café')
            return new CafeProduct($quality, $sellIn);
    }
}