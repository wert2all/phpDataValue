<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */


namespace wert2all\DataValue\Property;


abstract class PropertyAbstract implements PropertyInterface
{

    /** @var  string */
    protected $name;

    final public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    final public function getPropertyName()
    {
        return $this->name;
    }
}
