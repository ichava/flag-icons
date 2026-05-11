# Changelog

All notable changes to `ichava/flag-icons` follow [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and [Semantic Versioning](https://semver.org/).

## [Unreleased]

### Added

- Initial scaffold matching the Ichava child-pack convention: composer.json,
  IconsServiceProvider, IconsConstants, Variant enum, IconComponent, config/,
  tests/, CI.
- 265 country flag SVGs in `resources/assets/svg/files/4x3/` and
  `resources/assets/svg/files/1x1/`, salvaged from the deprecated
  `simtabi/laflamoji` package (which vendored them from `lipis/flag-icons`).
- `Variant` enum with `RATIO_4X3` (default) and `RATIO_1X1`.
- 5 Pest tests pinning provider boot, constants, enum class helpers,
  default variant, and registry pickup.

### Notes

- Assets are a 2022 snapshot of lipis/flag-icons. v1.0 will refresh from
  the current upstream to pick up any newer flags or design tweaks.
