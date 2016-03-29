<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */

namespace wert2all\DataValue\Example;

use wert2all\DataValue\AbstractDataValue;
use wert2all\DataValue\Property;

/**
 * @method Car setEngine(Engine $value)
 * @method Engine getEngine()
 * @method Car setColor($value)
 * @method mixed getColor()
 */
class Car extends AbstractDataValue
{
    /**
     * @return array
     */
    protected function getInitPropertyList()
    {
        return array(
            (new Property("engine"))->setValueType(Engine::class),
            new Property("color")
        );
    }
}
