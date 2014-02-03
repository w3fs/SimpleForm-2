<?php

// Sets error reporting

error_reporting(-1);
ini_set('display_errors',1);
ini_set('display_startup_errors',1);

$builder = require('SimpleForm/autoload.php');


FormBuilder\Builder::Input();
