# ichava/flag-icons

265 country-flag SVGs in two aspect ratios (4x3 + 1x1), packaged as an
Ichava-conformant icon pack. Sources from `lipis/flag-icons`, MIT-licensed.

Replaces the flag half of the deprecated `simtabi/laflamoji`. The emoji
half (Twemoji, OpenMoji) lives in [`ichava/emoji-sets`](https://github.com/ichava/emoji-sets).

## Install

```bash
composer require ichava/flag-icons
```

## Usage

```blade
{{-- Default aspect ratio (4x3) --}}
<x-ichava-flag-icons::icon name="us" />

{{-- Explicit ratio --}}
<x-ichava-flag-icons::icon name="1x1/us" />

{{-- Through the generic Ichava engine --}}
<x-ichava::icon name="ichava/flag-icons::4x3/jp" />

{{-- Helper function --}}
{{ ichava('ichava/flag-icons::1x1/de', ['class' => 'w-8 h-8 rounded-full']) }}
```

## Codes

Each filename is the ISO 3166-1 alpha-2 country code (`us`, `gb`, `de`,
`jp`, ...). Find the full list at <https://github.com/lipis/flag-icons>.

## CDN endpoints

Skip vendoring 530 SVGs and serve from a CDN. The pack registers these
templates in `config.json` so other Ichava tooling can read them:

```
https://cdn.jsdelivr.net/npm/flag-icons@7.0.0/flags/{ratio}/{code}.svg
https://unpkg.com/flag-icons@7.0.0/flags/{ratio}/{code}.svg
https://raw.githubusercontent.com/lipis/flag-icons/v7.0.0/flags/{ratio}/{code}.svg
```

- `{ratio}` is `4x3` or `1x1`
- `{code}` is the ISO 3166-1 alpha-2 country code (`us`, `gb`, `de`, ...)

## Upstream tracking

This pack participates in Ichava's upstream-tracking system. Run

```bash
php artisan ichava:icons:check-updates --package=ichava/flag-icons
```

to see whether a newer `lipis/flag-icons` release exists. The check
hits `registry.npmjs.org` (no rate limit) and caches results for 12
hours by default.

See `core/documentation/icon-pack-upstream-tracking.md` for the full
schema + event hooks.

## Status

**Stable (v1.x).** Two aspect ratios per flag, tracking upstream
[lipis/flag-icons](https://github.com/lipis/flag-icons) — currently
v7.5.0, refreshed automatically by the maintainer-toolkit sync.
