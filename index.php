<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 10/26/17
 * Time: 8:22 AM
 */

namespace Framework;

use Framework\Core\Application;

require './vendor/autoload.php';

$app = new Application();
$app->init();
$app->run();