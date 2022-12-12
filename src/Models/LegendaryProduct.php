<?php

namespace App\Models;

use App\Contracts\ProductInterface;
use App\Config;

class LegendaryProduct implements ProductInterface
{

    protected String $name;
    private Int $quality = Config::LEGEND_QUALITY;
    private Int $sellIn  = Config::MAX_DAYS;

    /**
     * Getting the quality of the product
     *
     * @return String
     **/
    protected function getQuality() : int
    {  
        return $this->quality; 
    }

    /**
     * Getting the days of the product
     *
     * @return String
     **/
    protected function getSellIn() : int
    {  
        return $this->sellIn; 
    }

    /**
     * Getting the name of the product
     *
     * @return String
     **/
    protected function getName() : String
    {  
        return $this->name; 
    }

    public function update() : void
    {
        
    }    
    
}