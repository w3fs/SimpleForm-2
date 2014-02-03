<?php

// Sets error reporting

error_reporting(-1);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);

require('SimpleForm/autoload.php');

/**
 * Create a new builder instance
 */


$builder = new SimpleForm\Builder();

/**
 * Attach your own methods under here
 */

$builder->attach(new SimpleForm\Modules\InputModule);
$builder->attach(new SimpleForm\Modules\HiddenModule);

echo $builder->Input();