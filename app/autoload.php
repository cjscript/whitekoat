<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__ . '/../vendor/autoload.php';

// added phpexcel include below for library reference.
require '../vendor/phpexcel/PHPExcel.php';

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
