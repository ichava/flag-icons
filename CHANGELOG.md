# Changelog

All notable changes to `ichava/flag-icons` follow [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and [Semantic Versioning](https://semver.org/).

## [0.2.0] - 2026-09-16

### Breaking

- **Requires `ichava/core: ^0.2`.** Core `0.2.0` moved its config key to `ichava.ichava-core.*`
  and renamed every Artisan command with no bare aliases, so a host application upgrading this
  package has to upgrade core with it.

### Added

- `release.yml` — a `v*.*.*` tag now publishes a release whose body is that version's CHANGELOG
  section, and fails closed when the tagged version has no section.
- PHPStan static analysis (level 0) with `composer analyse` and a code-quality CI workflow.

### Changed

- Third-party GitHub Actions pinned to the commit SHA of their latest release; `actions/*` keep
  floating on a major tag. A tag is mutable, so `@v4` is a promise the action's owner can
  rewrite; pinning GitHub's own actions inside GitHub's own runner buys nothing.
- The test harness reads `DB_CONNECTION`, so the suite targets SQLite, PostgreSQL, MySQL or
  MariaDB. SQLite runs enable `foreign_key_constraints`, which Laravel applies only when the key
  is present.
- Hardened CI workflows: concurrency groups, job timeouts, problem matchers, docs-only skip paths, test coverage, and tidy composer scripts.
- Aligned Pest to `^4.6 || ^5.0`, dropped the direct PHPUnit dependency, and applied Pint formatting.
- Refreshed bundled SVGs from upstream `lipis/flag-icons` 7.5.0: 271 flags in both aspect ratios (542 SVGs total).
- Aligned the install section with the pack standard: install, seed, then example usage. `ichava/core` installs as a dependency, so only the pack is required.

### Fixed

- Corrected every documented icon path to the resolving form: the `::` separator with an explicit ratio prefix (e.g. `ichava/flag-icons::4x3/ke`). Single-colon and ratio-less examples threw at render time. The pack component is `<x-flag-icons-icon>` with a `variant` attribute.

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
