<?php
/**
 * Created by PhpStorm.
 * User: wert2all
 * Date: 14.02.16
 * Time: 15:16
 */

namespace Example;


use wert2all\DataValue\Example\Car;
use wert2all\DataValue\Property;

class CarTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Car */
    protected $car;

    /**
     * @return array
     * @throws \wert2all\DataValue\Exception\Property\ReadOnly
     */
    public function dataProviderCar()
    {
        $property = new Property("engineName");
        $property->setValue("zaz");

        return array(
            array(1),
            array($property)
        );
    }

    /**
     * @dataProvider  dataProviderCar
     * @param mixed $value
     */
    public function testEngineCar($value)
    {
        $this->assertEquals($value, $this->car->setEngine($value)->getEngine());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->car = new Car();
    }
}
