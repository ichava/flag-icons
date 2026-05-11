<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\FlagIcons\View\Components;

use Simtabi\Laranail\Ichava\FlagIcons\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\View\Components\IconComponent as BaseIconComponent;

/**
 * Blade component for the country-flag pack.
 *
 * Usage:
 *
 *   {{-- Default ratio (4x3) --}}
 *   <x-ichava-flag-icons::icon name="us" />
 *
 *   {{-- Explicit ratio --}}
 *   <x-ichava-flag-icons::icon name="1x1/us" />
 *
 *   {{-- Through the generic Ichava engine --}}
 *   <x-ichava::icon name="ichava/flag-icons::4x3/us" />
 */
class IconComponent extends BaseIconComponent
{
    protected function getIconSet(): string
    {
        return IconsConstants::getPackageName();
    }

    protected function getVendorPackage(): string
    {
        return IconsConstants::getVendorPackage();
    }
}
