<?php

namespace wert2all\DataValue\Example;


use wert2all\DataValue\AbstractDataValue;
use wert2all\DataValue\Property;

/**
 * @method Car setEngine($value)
 * @method mixed getEngine()
 * @method Car setColor($value)
 * @method mixed getColor()
 */
class Car extends AbstractDataValue
{


    /**
     * @return array
     */
    protected function _getInitPropertyList()
    {
        return array(
            new Property("engine"),
            new Property("color")
        );
    }
}
