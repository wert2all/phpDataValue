<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */

use wert2all\Autoloader;

define('ROOT_DIR', dirname(__FILE__));
// init autoloader
require_once(ROOT_DIR . '/vendor/autoload.php');
require_once(ROOT_DIR . '/classes/Autoloader.php');

$loader = new Autoloader();
$loader->addNamespace("wert2all", realpath(ROOT_DIR . DIRECTORY_SEPARATOR . "classes" . DIRECTORY_SEPARATOR));
$loader->register();
