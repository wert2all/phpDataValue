<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */


namespace Tests\DataValue;

use wert2all\DataValue\Property;
use wert2all\DataValue\Property\PropertyInterface;

class PropertyTest extends \PHPUnit_Framework_TestCase
{
    /** @var  PropertyInterface */
    protected $property;

    public function testValue()
    {
        $this->property->setValue("1");
        $this->assertEquals("1", $this->property->getValue());
    }

    public function testSetterReturnValue()
    {
        $this->assertInstanceOf("wert2all\DataValue\Property\PropertyInterface", $this->property->setValue("1"));
    }

    public function testReadOnlyReturnValue()
    {
        $this->assertInstanceOf("wert2all\DataValue\Property\PropertyInterface", $this->property->setReadOnly());
    }

    public function testRequiredReturnValue()
    {
        $this->assertInstanceOf("wert2all\DataValue\Property\PropertyInterface", $this->property->setRequired());
    }

    public function testSetterReadOnly()
    {
        $this->property->setReadOnly();
        $this->assertFalse($this->property->isValueSet());

        $this->property->setValue("1");
        $this->assertTrue($this->property->isValueSet());
    }

    /** @expectedException  wert2all\DataValue\Exception\Property\ReadOnly */
    public function testFailOnSettingReadOnly()
    {
        $this->property->setReadOnly();
        $this->property->setValue("1");
        $this->property->setValue("2");
    }

    public function testReadOnly()
    {
        $this->property
            ->setReadOnly()
            ->setValue("1");

        $this->assertEquals("1", $this->property->getValue());
        $this->assertEquals("1", $this->property->getValue());

    }

    public function testReadOnlyValue()
    {
        $this->property
            ->setReadOnly()
            ->setValue("1");
        try {
            $this->property->setValue("2");
        } catch (\Exception $e) {

        }

        $this->assertEquals("1", $this->property->getValue());
    }

    /** @expectedException wert2all\DataValue\Exception\Property\Required */
    public function testRequiredFail()
    {
        $this->property->setRequired();
        $this->property->getValue();
    }

    public function testRequired()
    {
        $this->assertEquals(
            "1",
            $this->property->setRequired()
                ->setValue("1")
                ->getValue()
        );
    }

    public function testToString()
    {
        $this->property->setValue("test value");
        $this->assertEquals("test: test value", $this->property->toString());
    }

    /**
     * @param $expected
     * @param PropertyInterface $firstProperty
     * @param PropertyInterface $secondProperty
     * @dataProvider providerEqualTest
     */
    public function testEqual($expected, PropertyInterface $firstProperty, PropertyInterface $secondProperty)
    {
        $this->assertEquals($expected, $firstProperty->equal($secondProperty));
    }

    /**
     * @return array
     */
    public function providerEqualTest()
    {
        return array(
            array(true, new Property('first'), new Property("first")),
            array(false, new Property('first'), new Property("second")),

            array(
                true,
                (new Property('first'))
                    ->setValue("2"),
                (new Property("first"))
                    ->setValue("2")
            ),
            array(
                false,
                (new Property('first')),
                (new Property("first"))
                    ->setValue("2")
            ),
            array(
                true,
                (new Property('first'))
                    ->setReadOnly(),
                (new Property("first"))
                    ->setReadOnly()
            ),
            array(
                false,
                (new Property('first')),
                (new Property("first"))
                    ->setReadOnly()
            ),
            array(
                true,
                (new Property('first'))
                    ->setRequired()
                    ->setValue("1"),
                (new Property("first"))
                    ->setRequired()
                    ->setValue("1")
            ), array(
                false,
                (new Property('first'))
                    ->setValue("1"),
                (new Property("first"))
                    ->setRequired()
                    ->setValue("1")
            ),
        );
    }

    protected function setUp()
    {
        parent::setUp();
        $this->property = new Property("test");
    }
}
