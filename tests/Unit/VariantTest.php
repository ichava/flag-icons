<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\FlagIcons\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Simtabi\Laranail\Ichava\FlagIcons\Enums\Variant;

/**
 * Pure-enum behaviour tests. Anything that touches config.json (default(),
 * isDefault(), getClass(), getPath()) lives in the Feature suite where the
 * Laravel container is bootstrapped.
 */
class VariantTest extends TestCase
{
    public function test_4x3_case_value(): void
    {
        $this->assertSame('4x3', Variant::RATIO_4X3->getValue());
    }

    public function test_1x1_case_value(): void
    {
        $this->assertSame('1x1', Variant::RATIO_1X1->getValue());
    }

    public function test_values_returns_every_case(): void
    {
        $values = Variant::values();

        $this->assertCount(2, $values);
        $this->assertSame(['4x3', '1x1'], $values);
    }

    public function test_try_from_value_resolves_known_and_rejects_unknown(): void
    {
        $this->assertSame(Variant::RATIO_4X3, Variant::tryFromValue('4x3'));
        $this->assertSame(Variant::RATIO_1X1, Variant::tryFromValue('1x1'));
        $this->assertNull(Variant::tryFromValue('not-a-real-variant'));
    }
}
