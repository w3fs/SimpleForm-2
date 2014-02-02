<?php

// Set error handling

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

/**
 * Require the files (later, composer)
 */

require('SimpleForm/Builder.php');
require('SimpleForm/Modules/Input.php');

/**
 * Create a new builder instance
 */


$builder = new FormBuilder\Builder();


/**
 * The modules will be attacted under here
 */

$builder->attach(new FormBuilder\Modules\Input);

/**
 * Return the builder instance so it is ready to use for the developer
 */


return $builder;