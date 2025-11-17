<?php

return [
    'disable'    => env('CAPTCHA_DISABLE', false),
    'characters' => ['2', '3', '4', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'm', 'n', 'p', 'q', 'r', 't', 'u', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'M', 'N', 'P', 'Q', 'R', 'T', 'U', 'X', 'Y', 'Z'],
    'default'    => [
        'length'  => 9,
        'width'   => 120,
        'height'  => 36,
        'quality' => 90,
        'math'    => false,
        'expire'  => 60,
        'encrypt' => false,
    ],
'math' => [
    'length' => 9,
    'width' => 120,
    'height' => 36,
    'quality' => 90,

    'math' => [
        'operations' => ['+']
    ],

    'lines' => 0,
    'bgImage' => false,
    'bgColor' => '#ffffff',
    'fontColors' => ['#000000'],
    'contrast' => 0,
],

];
