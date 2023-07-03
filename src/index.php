<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Alucas\td3\Scrapper;

$scrapper = new Scrapper();

$persos = $scrapper->getAllcharacters();

var_dump($persos);

?>