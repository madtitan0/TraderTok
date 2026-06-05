<style>
.ib-search-select {
  position: relative;
}

.ib-search-select-input {
  width: 100%;
}

.ib-search-select-list {
  position: absolute;
  left: 0;
  right: 0;
  top: calc(100% + 4px);
  z-index: 40;
  max-height: 260px;
  overflow-y: auto;
  margin: 0;
  padding: 4px 0;
  list-style: none;
  background: var(--bg-secondary, #1a1a1a);
  border: 1px solid var(--border-color, rgba(255, 255, 255, 0.12));
  border-radius: 10px;
  box-shadow: 0 12px 32px rgba(0, 0, 0, 0.35);
}

.ib-search-select-option {
  padding: 10px 14px;
  cursor: pointer;
  font-size: 0.95rem;
  color: var(--text-primary, #f2f2f2);
}

.ib-search-select-option:hover,
.ib-search-select-option.is-highlighted {
  background: rgba(230, 57, 70, 0.12);
}

.ib-search-select-option[hidden] {
  display: none !important;
}
</style>
