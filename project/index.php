<?php

define('ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);
define('HEADER', APP . 'views/templates/header.php');
define('FOOTER', APP . 'views/templates/footer.php');

require APP . '/config/config.php';
require APP . '/core/application.php';
require APP . '/core/rest.php';
require APP . '/core/controller.php';

$app = new Application();