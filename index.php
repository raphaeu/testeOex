<?php
const ROOT_DIR = __DIR__;
require_once ( ROOT_DIR . '/Core/autoload.php' );
require_once ( ROOT_DIR . '/Core/config.php' );

use Core\System;

$system = new System();
$system->run();
