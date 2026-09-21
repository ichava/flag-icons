<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\IconSetsFlag\Enums\Variant;

/**
 * Pins the canonical `resources/` shape shared by every Ichava icon pack.
 *
 * The variant assertion is the load-bearing one. bundled-icons shipped a
 * verbatim copy of metronic-icons' translation file -- wrong product, wrong
 * categories -- and nothing caught it, because no pack registers translations
 * and so nothing ever read the file. Comparing the keys against a real enum is
 * what makes a copied file fail.
 */
function flag_resources(): string
{
    return dirname(__DIR__, 2) . '/resources';
}

/** @return array<string, mixed> */
function flag_lang(): array
{
    return require flag_resources() . '/lang/en/icons.php';
}

it(description: 'ships every directory of the canonical resource shape', closure: function () {
    foreach ([
        'assets/svg/config.json',
        'assets/svg/files',
        'lang/en/icons.php',
        'views/components',
    ] as $path) {
        expect(file_exists(flag_resources() . '/' . $path))->toBeTrue("missing resources/{$path}");
    }
});

it(description: 'does not name the translation group after the locale', closure: function () {
    // lang/en/en.php produced `<namespace>::en.name`, with the locale doubled.
    expect(file_exists(flag_resources() . '/lang/en/en.php'))->toBeFalse();
});

it(description: 'does not duplicate config.json metadata in english', closure: function () {
    // config.json is canonical for name and description -- IconRegistry reads
    // it. A copy here is exactly what drifted in the packs that had one.
    expect(flag_lang())->not->toHaveKey('name')
        ->and(flag_lang())->not->toHaveKey('description');
});

it(description: 'matches its variant keys to the Variant enum exactly', closure: function () {
    $expected = array_column(Variant::cases(), 'value');
    sort($expected);

    foreach (['variants', 'variant_descriptions'] as $group) {
        $actual = array_keys(flag_lang()[$group]);
        sort($actual);

        expect($actual)->toBe(
            $expected,
            "resources/lang/en/icons.php [{$group}] does not match the Variant enum. "
            . 'A mismatch here usually means the file was copied from another pack.',
        );
    }
});

it(description: 'declares itself as this package in config.json', closure: function () {
    $config = json_decode(
        (string) file_get_contents(flag_resources() . '/assets/svg/config.json'),
        true,
        flags: JSON_THROW_ON_ERROR,
    );

    expect($config['package']['name'])->toBe('ichava/icon-sets-flag');
});
