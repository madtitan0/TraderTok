/**
 * Educational forex calculators for the edu-resources page.
 * Illustrative only; broker contract specs and conversions may differ.
 */
(function () {
  'use strict';

  var JPY_PAIRS = { usdjpy: 1, eurjpy: 1, gbpjpy: 1 };

  function parseNum(value, fallback) {
    if (value === undefined || value === null) {
      return fallback;
    }
    var v = parseFloat(String(value).replace(',', '.'));
    return Number.isFinite(v) ? v : fallback;
  }

  function formatMoney(n) {
    if (!Number.isFinite(n)) {
      return '—';
    }
    return n.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  }

  function formatLots(n) {
    if (!Number.isFinite(n)) {
      return '—';
    }
    return n.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 4 });
  }

  /** Price distances (risk/reward in quote terms); not account currency — needs more decimals than money. */
  function formatPriceDistance(n) {
    if (!Number.isFinite(n)) {
      return '—';
    }
    var abs = Math.abs(n);
    var opts =
      abs < 0.02
        ? { minimumFractionDigits: 4, maximumFractionDigits: 6 }
        : { minimumFractionDigits: 2, maximumFractionDigits: 5 };
    return n.toLocaleString(undefined, opts);
  }

  /**
   * USD per pip for 1.0 full lot (100k units), account in USD (illustrative).
   * USD-quoted majors: $10/pip/lot. JPY-related: 1000 JPY per pip per lot → USD via USD/JPY.
   */
  function pipUsdPerFullLot(pair, usdjpy) {
    var rate = parseNum(usdjpy, NaN);
    if (JPY_PAIRS[pair]) {
      if (!(rate > 0)) {
        return { ok: false, message: 'Enter a valid USD/JPY rate for this pair.' };
      }
      return { ok: true, value: 1000 / rate };
    }
    return { ok: true, value: 10 };
  }

  function toggleJpyFields(pairSelect, jpyWrap, usdjpyInput) {
    var pair = pairSelect.value;
    var need = !!JPY_PAIRS[pair];
    jpyWrap.hidden = !need;
    if (need && usdjpyInput && !parseNum(usdjpyInput.value, 0)) {
      usdjpyInput.value = '150';
    }
  }

  function runPipCalc() {
    var pairEl = document.getElementById('edu-calc-pip-pair');
    var lotEl = document.getElementById('edu-calc-pip-lot');
    var usdjpyEl = document.getElementById('edu-calc-pip-usdjpy');
    var out = document.getElementById('edu-calc-pip-out');
    if (!pairEl || !lotEl || !out) {
      return;
    }

    var pair = pairEl.value;
    var lot = parseNum(lotEl.value, NaN);
    var usdjpy = usdjpyEl ? parseNum(usdjpyEl.value, NaN) : NaN;

    if (!(lot > 0)) {
      out.innerHTML = '<p class="edu-calc-result-msg edu-calc-result-msg--warn">Enter a lot size greater than zero.</p>';
      return;
    }

    var perFull = pipUsdPerFullLot(pair, usdjpy);
    if (!perFull.ok) {
      out.innerHTML =
        '<p class="edu-calc-result-msg edu-calc-result-msg--warn">' +
        escapeHtml(perFull.message) +
        '</p>';
      return;
    }

    var perPip = perFull.value * lot;
    out.innerHTML =
      '<p class="edu-calc-result-msg"><strong>≈ $' +
      formatMoney(perPip) +
      '</strong> per pip (USD, illustrative) for <strong>' +
      formatLots(lot) +
      '</strong> lot(s).</p>';
  }

  function runPosCalc() {
    var pairEl = document.getElementById('edu-calc-pos-pair');
    var balanceEl = document.getElementById('edu-calc-pos-balance');
    var riskEl = document.getElementById('edu-calc-pos-risk');
    var slEl = document.getElementById('edu-calc-pos-sl');
    var usdjpyEl = document.getElementById('edu-calc-pos-usdjpy');
    var out = document.getElementById('edu-calc-pos-out');
    if (!pairEl || !balanceEl || !riskEl || !slEl || !out) {
      return;
    }

    var pair = pairEl.value;
    var balance = parseNum(balanceEl.value, NaN);
    var riskPct = parseNum(riskEl.value, NaN);
    var slPips = parseNum(slEl.value, NaN);
    var usdjpy = usdjpyEl ? parseNum(usdjpyEl.value, NaN) : NaN;

    if (!(balance > 0) || !(riskPct > 0) || !(slPips > 0)) {
      out.innerHTML =
        '<p class="edu-calc-result-msg edu-calc-result-msg--warn">Enter a positive balance, risk %, and stop distance in pips.</p>';
      return;
    }

    var perFull = pipUsdPerFullLot(pair, usdjpy);
    if (!perFull.ok) {
      out.innerHTML =
        '<p class="edu-calc-result-msg edu-calc-result-msg--warn">' +
        escapeHtml(perFull.message) +
        '</p>';
      return;
    }

    var pipUsdFull = perFull.value;
    var riskUsd = balance * (riskPct / 100);
    var denom = slPips * pipUsdFull;
    if (!(denom > 0)) {
      out.innerHTML = '<p class="edu-calc-result-msg edu-calc-result-msg--warn">Cannot compute: check inputs.</p>';
      return;
    }

    var lots = riskUsd / denom;
    out.innerHTML =
      '<p class="edu-calc-result-msg">Risk budget ≈ <strong>$' +
      formatMoney(riskUsd) +
      '</strong>. Suggested size ≈ <strong>' +
      formatLots(lots) +
      '</strong> lot(s) (illustrative).</p>';
  }

  function runRrCalc() {
    var sideEl = document.getElementById('edu-calc-rr-side');
    var entryEl = document.getElementById('edu-calc-rr-entry');
    var slEl = document.getElementById('edu-calc-rr-sl');
    var tpEl = document.getElementById('edu-calc-rr-tp');
    var out = document.getElementById('edu-calc-rr-out');
    if (!sideEl || !entryEl || !slEl || !tpEl || !out) {
      return;
    }

    var side = sideEl.value;
    var entry = parseNum(entryEl.value, NaN);
    var sl = parseNum(slEl.value, NaN);
    var tp = parseNum(tpEl.value, NaN);

    if (![entry, sl, tp].every(Number.isFinite)) {
      out.innerHTML =
        '<p class="edu-calc-result-msg edu-calc-result-msg--warn">Enter numeric prices for entry, stop, and target.</p>';
      return;
    }

    var risk;
    var reward;
    var hint = '';

    if (side === 'buy') {
      risk = entry - sl;
      reward = tp - entry;
      if (risk <= 0) {
        hint = ' For a buy, stop-loss should be below entry.';
      }
      if (reward <= 0) {
        hint += ' For a buy, take-profit should usually be above entry.';
      }
    } else {
      risk = sl - entry;
      reward = entry - tp;
      if (risk <= 0) {
        hint = ' For a sell, stop-loss should be above entry.';
      }
      if (reward <= 0) {
        hint += ' For a sell, take-profit should usually be below entry.';
      }
    }

    if (!(risk > 0)) {
      out.innerHTML =
        '<p class="edu-calc-result-msg edu-calc-result-msg--warn">Risk distance must be greater than zero. Check entry vs stop.' +
        escapeHtml(hint) +
        '</p>';
      return;
    }

    if (!(reward > 0)) {
      out.innerHTML =
        '<p class="edu-calc-result-msg edu-calc-result-msg--warn">Reward distance must be greater than zero. Check entry vs take-profit.' +
        escapeHtml(hint) +
        '</p>';
      return;
    }

    var ratio = reward / risk;
    out.innerHTML =
      '<p class="edu-calc-result-msg">Risk distance: <strong>' +
      formatPriceDistance(risk) +
      '</strong> · Reward distance: <strong>' +
      formatPriceDistance(reward) +
      '</strong> · Ratio ≈ <strong>1 : ' +
      ratio.toLocaleString(undefined, { maximumFractionDigits: 3 }) +
      '</strong> (reward : risk).</p>';
  }

  function escapeHtml(s) {
    var d = document.createElement('div');
    d.textContent = s;
    return d.innerHTML;
  }

  function init() {
    var pipForm = document.getElementById('edu-calc-pip-form');
    var posForm = document.getElementById('edu-calc-pos-form');
    var rrForm = document.getElementById('edu-calc-rr-form');
    var pipPair = document.getElementById('edu-calc-pip-pair');
    var pipJpyWrap = document.getElementById('edu-calc-pip-jpy-wrap');
    var pipUsdjpy = document.getElementById('edu-calc-pip-usdjpy');
    var posPair = document.getElementById('edu-calc-pos-pair');
    var posJpyWrap = document.getElementById('edu-calc-pos-jpy-wrap');
    var posUsdjpy = document.getElementById('edu-calc-pos-usdjpy');

    if (pipPair && pipJpyWrap) {
      toggleJpyFields(pipPair, pipJpyWrap, pipUsdjpy);
      pipPair.addEventListener('change', function () {
        toggleJpyFields(pipPair, pipJpyWrap, pipUsdjpy);
      });
    }
    if (posPair && posJpyWrap) {
      toggleJpyFields(posPair, posJpyWrap, posUsdjpy);
      posPair.addEventListener('change', function () {
        toggleJpyFields(posPair, posJpyWrap, posUsdjpy);
      });
    }

    if (pipForm) {
      pipForm.addEventListener('submit', function (e) {
        e.preventDefault();
        runPipCalc();
      });
    }
    if (posForm) {
      posForm.addEventListener('submit', function (e) {
        e.preventDefault();
        runPosCalc();
      });
    }
    if (rrForm) {
      rrForm.addEventListener('submit', function (e) {
        e.preventDefault();
        runRrCalc();
      });
    }

    runPipCalc();
    runPosCalc();
    runRrCalc();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
