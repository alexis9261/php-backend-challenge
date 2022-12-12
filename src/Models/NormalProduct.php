<?php

namespace App\Models;

use App\Contracts\ProductInterface;
use App\Config;

class NormalProduct implements ProductInterface
{

    protected String $name = "Productos normales";

    protected Int $quality;

    protected Int $sellIn;

    public function __constructor( int $quality, int $sellIn ){
        $this->quality = $quality;
        $this->sellIn  = $sellIn;
    }

    /**
     * Getting the name of the product
     *
     * @return String
     **/
    public function getName() : String
    {
        return $this->name;
    }

     /**
     * Getting the quality of the product
     *
     * @return int
     **/
    public function getQuality() : int
    {
        return $this->quality;
    }

     /**
     * Getting the sellIn of the product
     *
     * @return int
     **/
    public function getSellIn() : int
    {
        return $this->sellIn;
    }

    /**
     * Setting the quality of the product
     *
     * @param Int $quality
     * @return void
     **/
    public function setQuality(int $quality) : void
    {
        $this->quality = $quality;
    }

    /**
     * Setting the sellIn of the product
     *
     * @param Int $sellIn
     * @return void
     **/
    public function setSellIn(int $sellIn) : void
    {
        $this->sellIn = $sellIn;
    }


    /**
     * Decrement the sellIn property
     *
     * @return void
     **/
    protected function decrementSellIn() : void
    {
        $this->sellIn = $this->sellIn - 1;
    }

    /**
     * Decrement the quality property
     *
     * @return void
     **/
    protected function decrementQuality(int $quantity) : void
    {
        $this->quality = $this->quality - $quantity;
    }

    /**
     * update product parameters
     *
     * @return void
     **/
    public function update() : void
    {
        $this->decrementSellIn();

        if($this->sellIn == 0){
            $this->decrementQuality(Config::DEC_QUALITY_WIHTOUT_DAYS);
        }else{
            $this->decrementQuality(Config::DEC_QUALITY_NORMAL);
        }

        if($this->quality < Config::MIN_QUALITY){
            $this->setQuality(Config::MIN_QUALITY);
        }
        if($this->quality > Config::MAX_QUALITY) {
            $this->setQuality(Config::MAX_QUALITY);
        }
    }
    
}