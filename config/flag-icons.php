<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\FlagIcons\Constants\IconsConstants;

return [
    'set' => [
        'name' => IconsConstants::getPackageName(),
        'prefix' => IconsConstants::getPrefix(),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Aspect Ratio
    |--------------------------------------------------------------------------
    | When a flag is referenced without an explicit ratio prefix, this
    | variant supplies the SVG.
    |
    | Supported: 4x3 | 1x1
    */
    'default_variant' => env('ICHAVA_FLAG_DEFAULT_VARIANT', '4x3'),
];
