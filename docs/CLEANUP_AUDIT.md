# Cleanup Audit

## Concrete issues found
- `index.php` referenced missing files:
  - `includes/extraMenuPage.php`
  - `includes/document.php`
  - `includes/BlogDetail.php`
- The existing router was a long `if/elseif` chain, which made updates error-prone.
- Design tokens for colors, font family, and layout lived inside large page/global styles instead of a dedicated shared token file.
- Some footer and support links still point to `#`, which means they are placeholders and not production-ready.

## Safe cleanup approach applied
- Added centralized route configuration in `config/page-routes.php`.
- Added shared token layer in `assets/css/design-tokens.css`.
- Added a new clean scaffold in `clean/` for organized future migration.

## Recommended next cleanup passes
1. Replace footer placeholder links with real URLs or remove them.
2. Audit all includes for unused CSS/JS imports.
3. Migrate repeated section patterns into shared partials.
4. Standardize page-level styles around shared design tokens.
5. Add a deployment checklist for metadata, broken links, performance, and accessibility.
