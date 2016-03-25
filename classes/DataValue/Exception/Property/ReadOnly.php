<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */

namespace wert2all\DataValue\Exception\Property;

class ReadOnly extends \Exception
{
    public function __construct($message = null, $code = null, \Exception $previous = null)
    {
        parent::__construct("This property is read-only.", $code, $previous);
    }
}
