<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\FlagIcons\Providers;

use Simtabi\Laranail\Ichava\FlagIcons\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\FlagIcons\View\Components\IconComponent;
use Simtabi\Laranail\Ichava\Services\IconRegistry;
use Simtabi\Laranail\Ichava\Support\ServiceProvider;
use Simtabi\Laranail\Package\Tools\Exceptions\InvalidPackage;
use Simtabi\Laranail\Package\Tools\Exceptions\InvalidPath;
use Simtabi\Laranail\Package\Tools\Package;

/**
 * Registers the country-flag pack with the Ichava registry.
 *
 * Ships 265 country flags in two aspect ratios (4x3 and 1x1), sourced
 * from lipis/flag-icons. The aspect ratio is the variant axis -- pick
 * one at render time.
 */
class IconsServiceProvider extends ServiceProvider
{
    /**
     * @throws InvalidPath
     * @throws InvalidPackage
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->setName(IconsConstants::getVendorPackage())
            ->setPathFrom(source: $this, levelsUp: 2)
            ->hasConfigFile('flag-icons');
    }

    public function bootingPackage(): void
    {
        $this->loadBladeComponent(componentClass: IconComponent::class, packageName: 'flag-icons');

        $this->app->make(IconRegistry::class)->fromDirectory(
            $this->package->basePath('resources/assets/svg'),
            self::class,
        );
    }
}
