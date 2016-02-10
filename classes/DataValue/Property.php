<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */


namespace wert2all\DataValue;


use wert2all\DataValue\Exception\Property\ReadOnly;
use wert2all\DataValue\Exception\Property\Required;
use wert2all\DataValue\Property\PropertyAbstract;
use wert2all\DataValue\Property\PropertyInterface;

class Property extends PropertyAbstract implements PropertyInterface
{
    /** @var  mixed */
    protected $value;
    /** @var  boolean */
    protected $isReadOnly = false;
    /** @var boolean */
    protected $isValueSet = false;
    /** @var  boolean */
    protected $isRequired = false;

    /**
     * @return mixed
     * @throws Required
     */
    public function getValue()
    {
        if ($this->isRequired === true and $this->isValueSet() !== true) {
            throw  new Required();
        }
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return PropertyInterface
     * @throws ReadOnly
     */
    public function setValue($value)
    {
        if ($this->isReadOnly === true and $this->isValueSet() === true) {
            throw  new ReadOnly();
        }
        $this->value = $value;
        $this->isValueSet = true;
        return $this;
    }

    /** @return  boolean */
    public function isValueSet()
    {
        return ($this->isValueSet);
    }

    /**
     * @return PropertyInterface
     */
    public function setReadOnly()
    {
        $this->isReadOnly = true;
        return $this;
    }

    /**
     * @return PropertyInterface
     */
    public function setRequired()
    {
        $this->isRequired = true;
        return $this;
    }
}
