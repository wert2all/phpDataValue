<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */

namespace wert2all\DataValue\Tests\DataValue;

use wert2all\DataValue\Example\Car;
use wert2all\DataValue\Example\Engine;

class ComplexProperty extends \PHPUnit_Framework_TestCase
{
    /** @var  Car */
    protected $car;

    public function testComplex()
    {
        $this->assertEquals(4, $this->car->getEngine()->getCylinders());
        $this->assertEquals(200, $this->car->getEngine()->getPower());

        $this->car->getEngine()->setPower(300);
        $this->assertEquals(300, $this->car->getEngine()->getPower());
    }

    protected function setUp()
    {
        parent::setUp();

        $this->car = (new Car())
            ->setColor("red")
            ->setEngine(
                (new Engine())
                    ->setPower(200)
                    ->setCylinders(4)
            );
    }
}
