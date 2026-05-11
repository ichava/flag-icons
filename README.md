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

## Status

**Alpha (v0.1.0).** 265 flags, two aspect ratios. Vendored from a 2022
snapshot of lipis/flag-icons; v1.0 will refresh to the latest upstream.
