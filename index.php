<?php

require_once 'vendor/autoload.php';

$formatter = new \Nihar\Num2wordBd\Formatter();

echo $formatter->format(147570.12);
