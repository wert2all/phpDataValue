<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */

namespace wert2all\DataValue\Property;

interface PropertyInterface
{

    /**
     * @return mixed
     */
    public function getValue();

    /**
     * @param mixed $value
     * @return PropertyInterface
     */
    public function setValue($value);

    /**
     * @return PropertyInterface
     */
    public function setReadOnly();

    /** @return  boolean */
    public function isValueSet();

    /**
     * @return PropertyInterface
     */
    public function setRequired();

    /** @return string */
    public function getPropertyName();

    /** @return string */
    public function toString();

    /**
     * @param PropertyInterface $property
     * @return boolean
     */
    public function equal(PropertyInterface $property);

    /**
     * @return boolean
     */
    public function isReadOnly();

    /**
     * @return boolean
     */
    public function isRequired();
}
