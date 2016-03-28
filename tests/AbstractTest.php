<?php

/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */
namespace Tests\DataValue;

use wert2all\DataValue\AbstractDataValue;
use wert2all\DataValue\Example\Car;
use wert2all\DataValue\Property;

class AbstractTest extends \PHPUnit_Framework_TestCase
{
    /** @var  AbstractDataValue */
    protected $param;

    /** @expectedException wert2all\DataValue\Exception\NotSetterNotGetter */
    public function testBadMethod()
    {
        $this->param->tesEngine();
    }

    /** @expectedException  wert2all\DataValue\Exception\SetterOneArgument */
    public function testSetterNullArgumentsException()
    {
        $this->param->setEngine();
    }

    /** @expectedException  wert2all\DataValue\Exception\SetterOneArgument */
    public function testSetterMoreOneArgumentsException()
    {
        $this->param->setEngine("1", "2");
    }

    /** @expectedException  wert2all\DataValue\Exception\GetterWithoutArguments */
    public function testGetterNotNUllArgumentsException()
    {
        $this->param->getEngine("1");
    }

    /** @expectedException  wert2all\DataValue\Exception\Property\Bad */
    public function testBadGetterException()
    {
        $this->param->getException();
    }

    /** @expectedException  wert2all\DataValue\Exception\Property\Bad */
    public function testBadSetterException()
    {
        $this->param->setException("S");
    }

    /**
     * Test upper case of getter
     *
     */
    public function testGetterUpperCase()
    {
        $this->param->setEngine("s");
        $this->param->getEngine();
        $this->param->getengine();
        $this->param->Getengine();
        $this->param->GetEngine();
    }

    /**
     * Test upper case of setter
     *
     */
    public function testSetterUpperCase()
    {
        $this->param->setEngine("1");
        $this->param->setengine("1");
        $this->param->Setengine("1");
        $this->param->SetEngine("1");
    }

    public function testSetterReturn()
    {
        $this->assertInstanceOf(
            "wert2all\DataValue\AbstractDataValue",
            $this->param->setEngine("1")
        );
    }
    
    public function testGetter()
    {
        $this->assertEquals(
            "test value",
            $this->param->setEngine("test value")
                ->getEngine()
        );
    }

    public function testToString()
    {
        $this->param
            ->setEngine("test")
            ->setColor("red");

        $this->assertEquals(
            "wert2all\DataValue\Example\Car values:\n\tengine: test,\n\tcolor: red,\n",
            $this->param->toString()
        );
    }

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
        $this->assertEquals($value, $this->param->setEngine($value)->getEngine());
    }

    protected function setUp()
    {
        parent::setUp();
        $this->param = new Car();
    }
}
