<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Data\Package;


class PackageTest extends TestCase
{
    /**
     * Can crate a package
     *
     * @return void
     */
    public function testCanCreatePackage()
    {
        $package = new package('title', 'description', 'price', '80', '£', '8 discount');
        $packageArr = $package->toArray();
        $this->assertIsArray($packageArr);
    }

    /**
     * Can convert a package to array
     *
     * @return void
     */
    public function testCanConvertPackageToArray()
    {
        $package = new package('title', 'description', 'price', '80', '£', '8 discount');
        $packageArr = $package->toArray();
        $this->assertIsArray($packageArr);
    }

    /**
     * Can get the title
     *
     * @return void
     */
    public function testCanGetTitle()
    {
        $package = new package('title', 'description', 'price', 80, '£', '8 discount');
        $title = $package->getTitle();
        $this->assertEquals($title, 'title');
    }

    /**
     * Can get the description
     *
     * @return void
     */
    public function testCanGetDescription()
    {
        $package = new package('title', 'description', 'price', 80, '£', '8 discount');
        $description = $package->getDescription();
        $this->assertEquals($description, 'description');
    }

    /**
     * Can get the price
     *
     * @return void
     */
    public function testCanGetPrice()
    {
        $package = new package('title', 'description', 'price', 80, '£', '8 discount');
        $price = $package->getPrice();
        $this->assertEquals($price, 'price');
    }

    /**
     * Can get the ammount
     *
     * @return void
     */
    public function testCanGetAmmount()
    {
        $package = new package('title', 'description', 'price', 80, '£', '8 discount');
        $ammount = $package->getAmmount();
        $this->assertEquals($ammount, 80);
    }

    /**
     * Can get the ammount
     *
     * @return void
     */
    public function testCanGetCurrency()
    {
        $package = new package('title', 'description', 'price', 80, '£', '8 discount');
        $currency = $package->getCurrency();
        $this->assertEquals($currency, '£');
    }

    /**
     * Can get the discount
     *
     * @return void
     */
    public function testCanGetDiscount()
    {
        $package = new package('title', 'description', 'price', 80, '£', '8 discount');
        $discount = $package->getDiscount();
        $this->assertEquals($discount, '8 discount');
    }

    /**
     * Can get the null discount
     *
     * @return void
     */
    public function testGetDiscountIsNull()
    {
        $package = new package('title', 'description', 'price', 80, '£');
        $discount = $package->getDiscount();
        $this->assertEquals($discount, null);
    }
}
