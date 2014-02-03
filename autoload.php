<?php

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