<?php

// Sets error reporting

error_reporting(-1);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);

require('SimpleForm/autoload.php');

/**
 * Create a new builder instance
 */


$builder = new FormBuilder\Builder();

/**
 * The modules will be attacted under here
 */

$builder->attach(new FormBuilder\Modules\InputModule);
