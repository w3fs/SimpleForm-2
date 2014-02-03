<?php

// Sets error reporting

error_reporting(-1);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);

$builder = require('autoload.php');


print_r(FormBuilder\Builder::Input());
