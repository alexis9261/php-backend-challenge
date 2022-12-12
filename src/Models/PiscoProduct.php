<?php

namespace App\Models;
use App\Config;

class PiscoProduct extends NormalProduct
{

    private String $name = "Pisco Peruano";

    /**
     * Increment the quality of the product
     *
     * @param Int $quantity
     **/
    public function incrementQuality(int $quantity) : void
    {
        $this->quality = $this->quality + $quantity;
    }

    /**
     * Update quality of the product
     *
     * @return void
     **/
    public function updateQuality() : void
    {
        if($this->sellIn === Config::MIN_DAYS) {
            $this->setQuality(Config::MIN_QUALITY);
        }elseif($this->sellIn <= 5) {
            $this->incrementQuality(Config::DEC_QUALITY_IN_FIVE_DAYS);
        }elseif($this->sellIn <= 10) {
            $this->incrementQuality(Config::DEC_QUALITY_IN_TEN_DAYS);
        }else{
            $this->incrementQuality(1);
        }

        if($this->quality > Config::MAX_QUALITY) {
            $this->setQuality(Config::MAX_QUALITY);
        }
    }

    /**
     * update product parameters
     *
     * @return void
     **/
    public function update() : void
    {
        $this->decrementSellIn();

        $this->updateQuality();        

        if($this->quality < Config::MIN_DAYS) {
            $this->setSellIn(Config::MIN_DAYS);
        }

    }

}