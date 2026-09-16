<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\FlagIcons\Enums\Variant;

/**
 * Pure-enum behaviour tests. Anything that touches config.json (default(),
 * isDefault(), getClass(), getPath()) lives in the Feature suite where the
 * Laravel container is bootstrapped.
 */
it('exposes the 4x3 case value', function () {
    expect(Variant::RATIO_4X3->getValue())->toBe('4x3');
});

it('exposes the 1x1 case value', function () {
    expect(Variant::RATIO_1X1->getValue())->toBe('1x1');
});

it('returns every case from values', function () {
    expect(Variant::values())->toBe(['4x3', '1x1']);
});

it('resolves known values and rejects unknown ones', function () {
    expect(Variant::tryFromValue('4x3'))->toBe(Variant::RATIO_4X3)
        ->and(Variant::tryFromValue('1x1'))->toBe(Variant::RATIO_1X1)
        ->and(Variant::tryFromValue('not-a-real-variant'))->toBeNull();
});
