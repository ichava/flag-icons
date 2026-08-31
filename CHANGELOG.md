# Changelog

All notable changes to `ichava/flag-icons` follow [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and [Semantic Versioning](https://semver.org/).

## [0.1.0] - 2026-08-31

First open-source release. An icon pack for the Ichava ecosystem: **542 SVGs**, registered with
`IconRegistry` at boot and served through `ichava/core`. 265 country flags in both aspect ratios, sourced from lipis/flag-icons.

The pack depends on `ichava/core` and never on `ichava/browser`; the browser discovers installed
packs at runtime. Categories are `1x1`, `4x3`.

Earlier tags existed on GitHub and were never published to Packagist. They are withdrawn: the
ecosystem restarts from a single `0.1.0` across every package.

### Added

- `IconsServiceProvider`, auto-discovered through `extra.laravel.providers`.
- `IconsConstants` reading the pack's `config.json`, and a type-safe enum implementing
  `IconSetVariantInterface`.
- An `IconComponent` extending core's base component, so `<x-ichava::icon>` resolves this pack's
  paths in both the `vendor/package::category/name` and dot forms.

### Fixed

- **`ichava/core` is pinned to a single line.** The constraint was `^1.0 || ^2.0` while
  `ichava/browser` required `^2.0`, so a resolver could legally pair core 1.x with a browser
  assuming 2.x. It is now `^0.1`, matching the rest of the ecosystem.
- **The package declares VCS repository entries for `ichava/core` and all three `laranail/*`
  dependencies.** None is published on Packagist, and Composer reads `repositories` only from the
  root package, so a pack installed as the root could not locate them at all.

### Requirements

- PHP `^8.4.1 || ^8.5`, `illuminate/support` `^13.0`, `ichava/core` `^0.1`,
  `laranail/package-tools` `^0.1.0`.
