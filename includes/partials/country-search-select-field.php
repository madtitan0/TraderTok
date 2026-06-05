<?php
/**
 * Searchable country field (same UX as IB application form).
 *
 * @var string $countryFieldPrefix e.g. openDemo, openLive
 * @var string $countryLabelFor     label `for` attribute target
 * @var string|null $countryLabelI18n optional data-i18n key for label text
 * @var string $countryLabelText     fallback label text
 */
$countryFieldPrefix = isset($countryFieldPrefix) ? (string) $countryFieldPrefix : 'openAccount';
$countryLabelFor = isset($countryLabelFor) ? (string) $countryLabelFor : $countryFieldPrefix . 'CountrySearch';
$countryLabelText = isset($countryLabelText) ? (string) $countryLabelText : 'Country / region';
$countryLabelI18n = isset($countryLabelI18n) ? (string) $countryLabelI18n : '';
?>
<div class="form-group">
  <label for="<?php echo htmlspecialchars($countryLabelFor, ENT_QUOTES, 'UTF-8'); ?>"<?php if ($countryLabelI18n !== '') : ?> data-i18n="<?php echo htmlspecialchars($countryLabelI18n, ENT_QUOTES, 'UTF-8'); ?>"<?php endif; ?>><?php echo htmlspecialchars($countryLabelText, ENT_QUOTES, 'UTF-8'); ?></label>
  <div class="ib-search-select" id="<?php echo htmlspecialchars($countryFieldPrefix, ENT_QUOTES, 'UTF-8'); ?>CountryWrap">
    <input type="hidden" name="country" id="<?php echo htmlspecialchars($countryFieldPrefix, ENT_QUOTES, 'UTF-8'); ?>Country" value="">
    <input
      type="text"
      id="<?php echo htmlspecialchars($countryFieldPrefix, ENT_QUOTES, 'UTF-8'); ?>CountrySearch"
      class="ib-search-select-input"
      placeholder="Search country..."
      autocomplete="off"
      autocorrect="off"
      spellcheck="false"
      aria-autocomplete="list"
      aria-controls="<?php echo htmlspecialchars($countryFieldPrefix, ENT_QUOTES, 'UTF-8'); ?>CountryList"
      aria-expanded="false"
      role="combobox"
      required
    >
    <ul class="ib-search-select-list" id="<?php echo htmlspecialchars($countryFieldPrefix, ENT_QUOTES, 'UTF-8'); ?>CountryList" role="listbox" hidden></ul>
  </div>
</div>
