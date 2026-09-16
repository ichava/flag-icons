<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\Services\IconRegistry;
use Simtabi\Laranail\Ichava\FlagIcons\Enums\Variant;
use Simtabi\Laranail\Ichava\FlagIcons\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\FlagIcons\Providers\IconsServiceProvider;

it('boots the provider without error', function () {
    $providers = array_keys($this->app->getLoadedProviders());

    expect($providers)->toContain(IconsServiceProvider::class);
});

it('resolves constants from config json', function () {
    expect(IconsConstants::getVendorPackage())->toBe('ichava/flag-icons')
        ->and(IconsConstants::getTitle())->toBe('Flag Icons')
        ->and(IconsConstants::getPrefix())->toBe('flag');
});

it('uses the config prefix in variant enum class helpers', function () {
    expect(Variant::RATIO_4X3->getClass())->toBe('flag-4x3')
        ->and(Variant::RATIO_1X1->getClass())->toBe('flag-1x1');
});

it('defaults to the 4x3 variant', function () {
    expect(Variant::default())->toBe(Variant::RATIO_4X3)
        ->and(Variant::RATIO_4X3->isDefault())->toBeTrue()
        ->and(Variant::RATIO_1X1->isDefault())->toBeFalse();
});

it('picks up the package in the icon registry', function () {
    $registry = $this->app->make(IconRegistry::class);

    expect($registry->isRegistered('ichava/flag-icons'))->toBeTrue(
        'IconRegistry should have ichava/flag-icons registered after boot.',
    );
});
