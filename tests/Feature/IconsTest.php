<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\FlagIcons\Tests\Feature;

use Simtabi\Laranail\Ichava\FlagIcons\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\FlagIcons\Enums\Variant;
use Simtabi\Laranail\Ichava\FlagIcons\Providers\IconsServiceProvider;
use Simtabi\Laranail\Ichava\FlagIcons\Tests\TestCase;
use Simtabi\Laranail\Ichava\Services\IconRegistry;

class IconsTest extends TestCase
{
    public function test_provider_boots_without_error(): void
    {
        $providers = array_keys($this->app->getLoadedProviders());

        $this->assertContains(
            IconsServiceProvider::class,
            $providers
        );
    }

    public function test_constants_resolve_from_config_json(): void
    {
        $this->assertSame('ichava/flag-icons', IconsConstants::getVendorPackage());
        $this->assertSame('Flag Icons', IconsConstants::getTitle());
        $this->assertSame('flag', IconsConstants::getPrefix());
    }

    public function test_variant_enum_class_helpers_use_config_prefix(): void
    {
        $this->assertSame('flag-4x3', Variant::RATIO_4X3->getClass());
        $this->assertSame('flag-1x1', Variant::RATIO_1X1->getClass());
    }

    public function test_default_variant_is_4x3(): void
    {
        $default = Variant::default();

        $this->assertSame(Variant::RATIO_4X3, $default);
        $this->assertTrue(Variant::RATIO_4X3->isDefault());
        $this->assertFalse(Variant::RATIO_1X1->isDefault());
    }

    public function test_icon_registry_picks_up_the_package(): void
    {
        /** @var IconRegistry $registry */
        $registry = $this->app->make(IconRegistry::class);

        $this->assertTrue(
            $registry->isRegistered('ichava/flag-icons'),
            'IconRegistry should have ichava/flag-icons registered after boot.'
        );
    }
}
