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
use wert2all\DataValue\Property\PropertyInterface;

/**
 * @method Engine setPower(mixed $value)
 * @method mixed getPower()
 * @method Engine setCylinders($value)
 * @method mixed getCylinders()
 */
class Engine extends AbstractDataValue
{

    /**
     * @return PropertyInterface[]
     */
    protected function getInitPropertyList()
    {
        return array(
            new Property("power"),
            new Property("cylinders")
        );
    }
}
