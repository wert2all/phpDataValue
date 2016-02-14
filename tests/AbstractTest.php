<?php

/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */
namespace Tests\DataValue;

use wert2all\DataValue\AbstractDataValue;
use wert2all\DataValue\Property;

class AbstractTest extends \PHPUnit_Framework_TestCase
{
    /** @var  AbstractDataValue */
    protected $param;

    /** @expectedException wert2all\DataValue\Exception\NotSetterNotGetter */
    public function testBadMethod()
    {
        $this->param->tesUrl();
    }

    /** @expectedException  wert2all\DataValue\Exception\SetterOneArgument */
    public function testSetterNullArgumentsException()
    {
        $this->param->setUrl();
    }

    /** @expectedException  wert2all\DataValue\Exception\SetterOneArgument */
    public function testSetterMoreOneArgumentsException()
    {
        $this->param->setUrl("1", "2");
    }

    /** @expectedException  wert2all\DataValue\Exception\GetterWithoutArguments */
    public function testGetterNotNUllArgumentsException()
    {
        $this->param->getUrl("1");
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
        $this->param->setUrl("s");
        $this->param->getUrl();
        $this->param->geturl();
        $this->param->Geturl();
        $this->param->GetUrl();
    }

    /**
     * Test upper case of setter
     *
     */
    public function testSetterUpperCase()
    {
        $this->param->setUrl("1");
        $this->param->seturl("1");
        $this->param->Seturl("1");
        $this->param->SetUrl("1");
    }

    public function testSetterReturn()
    {
        $this->assertInstanceOf("wert2all\DataValue\AbstractDataValue", $this->param->setUrl("1"));
    }


    public function testGetter()
    {
        $this->assertEquals(
            "test value",
            $this->param->setUrl("test value")
                ->getUrl()
        );
    }

    protected function setUp()
    {
        parent::setUp();

        $mock = $this->getMockBuilder('wert2all\DataValue\AbstractDataValue')
            ->setConstructorArgs(array(
                array(
                    new Property("url")
                )
            ))
            ->getMock();

        $this->param = $mock;
    }

}
