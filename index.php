<?php

use Nihar\Num2wordBd\Formatter;

require_once 'vendor/autoload.php';

$formatter = new Formatter();

echo $formatter->format(17647570);
