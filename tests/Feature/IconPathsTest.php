<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\Services\IconRegistry;
use Simtabi\Laranail\Ichava\Exceptions\IchavaException;

it(description: 'resolves and renders canonical paths', closure: function (string $path) {
    $registry = $this->app->make(IconRegistry::class);

    expect($registry->has($path))->toBeTrue()
        ->and($registry->render($path))->toContain('<svg');
})->with([
    'slash 4x3' => ['ichava/flag-icons::4x3/ke'],
    'slash 1x1' => ['ichava/flag-icons::1x1/ke'],
    'dot 4x3'   => ['ichava/flag-icons::4x3.ke'],
]);

it(description: 'rejects the single-colon separator', closure: function () {
    $registry = $this->app->make(IconRegistry::class);

    expect($registry->has('ichava/flag-icons:4x3/ke'))->toBeFalse()
        ->and(fn () => $registry->render('ichava/flag-icons:4x3/ke'))
        ->toThrow(IchavaException::class);
});

it(description: 'rejects a bare code without a ratio', closure: function () {
    $registry = $this->app->make(IconRegistry::class);

    expect($registry->has('ichava/flag-icons::ke'))->toBeFalse()
        ->and(fn () => $registry->render('ichava/flag-icons::ke'))
        ->toThrow(IchavaException::class);
});

it(description: 'renders the pack component with a variant attribute', closure: function () {
    $html = (string) $this->blade('<x-flag-icons-icon name="us" variant="4x3" />');

    expect($html)->toContain('<svg');
});

it(description: 'renders the generic component with a canonical path', closure: function () {
    $html = (string) $this->blade('<x-ichava::icon name="ichava/flag-icons::1x1/jp" />');

    expect($html)->toContain('<svg');
});
