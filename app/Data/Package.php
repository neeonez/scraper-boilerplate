<?php

namespace App\Data;

/**
 * Package data transfer object to be used with all package scrapers
 * 
 * @author Eduardo Lazaro me@edulazaro.com
 */
class Package
{
    /** @var string The package title */
    private $title;

    /** @var string The package description */
    private $description;

    /** @var string The package price field */
    private $price;

    /** @var float The package numeric price */
     private $ammount;

    /** @var string The package price */
    private $currency;

    /** @var string The package discount */
    private $discount;

    /**
     * Constructor
     */
    public function __construct($title, $description, $price, $ammount, $currency,  $discount = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->ammount = $ammount;
        if ($currency) $this->currency = $currency;
        if ($discount) $this->discount = $discount;
    }

    /**
     * Get an array with the package data
     * 
     * @return array
     */
    public function toArray(){
        return [
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'discount' => $this->discount,
        ];
    }

    /**
     * Get the package title
     * 
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Get the package description
     * 
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Get the package price
     * 
     * @return string
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * Get the package ammount
     * 
     * @return float
     */
    public function getAmmount() {
        return $this->ammount;
    }

    /**
     * Get the package currency
     * 
     * @return float
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * Get the package discount
     * 
     * @return string
     */
    public function getDiscount() {
        return $this->discount;
    }
}
