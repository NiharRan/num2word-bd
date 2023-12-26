<?php

it('example', function () {
    $formatter = new \Nihar\Num2wordBd\Formatter();
    $result = $formatter->format(17647570);
    expect($result)->toBe('One Kuti, Seventy Six Lakh, Forty Seven Thousand, Five Hundred, Seventy  Taka');
});