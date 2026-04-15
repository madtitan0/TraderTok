<?php
$edu_calc_pairs = [
    ['id' => 'eurusd', 'label' => 'EUR/USD'],
    ['id' => 'gbpusd', 'label' => 'GBP/USD'],
    ['id' => 'audusd', 'label' => 'AUD/USD'],
    ['id' => 'nzdusd', 'label' => 'NZD/USD'],
    ['id' => 'usdjpy', 'label' => 'USD/JPY'],
    ['id' => 'eurjpy', 'label' => 'EUR/JPY'],
    ['id' => 'gbpjpy', 'label' => 'GBP/JPY'],
];
?>

<div class="education-subpage-header" id="interactive-calculators">
    <h2 class="education-subpage-section-title">Interactive trading calculators</h2>
    <p class="education-subpage-section-subtitle">Use these tools to explore pip value, position sizing, and risk-reward in a hands-on way. Results are educational estimates based on typical forex contract assumptions (100,000 units per full lot where applicable). Your broker’s contract specifications, account currency conversion, and platform pricing may differ.</p>
</div>

<p class="edu-calc-disclaimer" role="note">These calculators do not constitute investment advice, signals, or recommendations. Trading leveraged products carries a high level of risk.</p>

<div class="edu-calc-grid">
    <article class="edu-calc-card" id="edu-calc-pip">
        <div class="education-article-meta">Pip value</div>
        <h3 class="edu-calc-card-title">Pip calculator</h3>
        <p class="edu-calc-card-intro">Estimate the account impact of a one-pip move for your chosen lot size. JPY pairs use the USD/JPY rate field to convert yen-denominated pip values into USD.</p>
        <form class="edu-calc-form" id="edu-calc-pip-form" novalidate>
            <div class="edu-calc-field">
                <label for="edu-calc-pip-pair">Currency pair</label>
                <select id="edu-calc-pip-pair" name="pair" class="edu-calc-input">
                    <?php foreach ($edu_calc_pairs as $p): ?>
                        <option value="<?php echo htmlspecialchars($p['id']); ?>"><?php echo htmlspecialchars($p['label']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="edu-calc-field edu-calc-field--inline">
                <label for="edu-calc-pip-lot">Lot size</label>
                <input type="number" id="edu-calc-pip-lot" name="lot" class="edu-calc-input" value="1" min="0.01" step="0.01" inputmode="decimal" />
            </div>
            <div class="edu-calc-field edu-calc-field--jpy" id="edu-calc-pip-jpy-wrap" hidden>
                <label for="edu-calc-pip-usdjpy">USD/JPY (for JPY conversion)</label>
                <input type="number" id="edu-calc-pip-usdjpy" name="usdjpy" class="edu-calc-input" value="150" min="0.0001" step="0.0001" inputmode="decimal" />
            </div>
            <button type="submit" class="edu-calc-submit">Calculate</button>
        </form>
        <div class="edu-calc-result" id="edu-calc-pip-out" aria-live="polite"></div>
    </article>

    <article class="edu-calc-card" id="edu-calc-position">
        <div class="education-article-meta">Position sizing</div>
        <h3 class="edu-calc-card-title">Position size calculator</h3>
        <p class="edu-calc-card-intro">Estimate lot size from account balance, risk percentage, stop distance in pips, and the same pip-value assumptions as above.</p>
        <form class="edu-calc-form" id="edu-calc-pos-form" novalidate>
            <div class="edu-calc-field">
                <label for="edu-calc-pos-pair">Currency pair</label>
                <select id="edu-calc-pos-pair" name="pair" class="edu-calc-input">
                    <?php foreach ($edu_calc_pairs as $p): ?>
                        <option value="<?php echo htmlspecialchars($p['id']); ?>"><?php echo htmlspecialchars($p['label']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="edu-calc-field edu-calc-field--inline">
                <label for="edu-calc-pos-balance">Account balance (USD)</label>
                <input type="number" id="edu-calc-pos-balance" name="balance" class="edu-calc-input" value="10000" min="1" step="1" inputmode="decimal" />
            </div>
            <div class="edu-calc-field edu-calc-field--inline">
                <label for="edu-calc-pos-risk">Risk per trade (%)</label>
                <input type="number" id="edu-calc-pos-risk" name="riskpct" class="edu-calc-input" value="1" min="0.01" max="100" step="0.01" inputmode="decimal" />
            </div>
            <div class="edu-calc-field edu-calc-field--inline">
                <label for="edu-calc-pos-sl">Stop loss (pips)</label>
                <input type="number" id="edu-calc-pos-sl" name="slpips" class="edu-calc-input" value="25" min="0.1" step="0.1" inputmode="decimal" />
            </div>
            <div class="edu-calc-field edu-calc-field--jpy" id="edu-calc-pos-jpy-wrap" hidden>
                <label for="edu-calc-pos-usdjpy">USD/JPY (for JPY conversion)</label>
                <input type="number" id="edu-calc-pos-usdjpy" name="usdjpy" class="edu-calc-input" value="150" min="0.0001" step="0.0001" inputmode="decimal" />
            </div>
            <button type="submit" class="edu-calc-submit">Calculate</button>
        </form>
        <div class="edu-calc-result" id="edu-calc-pos-out" aria-live="polite"></div>
    </article>

    <article class="edu-calc-card edu-calc-card--wide" id="edu-calc-rr">
        <div class="education-article-meta">Setup review</div>
        <h3 class="edu-calc-card-title">Risk-reward calculator</h3>
        <p class="edu-calc-card-intro">Enter entry, stop-loss, and take-profit prices. The tool compares distance to your stop (risk) with distance to your target (reward).</p>
        <form class="edu-calc-form edu-calc-form--rr" id="edu-calc-rr-form" novalidate>
            <div class="edu-calc-field">
                <label for="edu-calc-rr-side">Direction</label>
                <select id="edu-calc-rr-side" name="side" class="edu-calc-input">
                    <option value="buy">Buy (long)</option>
                    <option value="sell">Sell (short)</option>
                </select>
            </div>
            <div class="edu-calc-rr-row">
                <div class="edu-calc-field">
                    <label for="edu-calc-rr-entry">Entry price</label>
                    <input type="number" id="edu-calc-rr-entry" name="entry" class="edu-calc-input" value="1.0850" min="0" step="any" inputmode="decimal" />
                </div>
                <div class="edu-calc-field">
                    <label for="edu-calc-rr-sl">Stop loss</label>
                    <input type="number" id="edu-calc-rr-sl" name="sl" class="edu-calc-input" value="1.0820" min="0" step="any" inputmode="decimal" />
                </div>
                <div class="edu-calc-field">
                    <label for="edu-calc-rr-tp">Take profit</label>
                    <input type="number" id="edu-calc-rr-tp" name="tp" class="edu-calc-input" value="1.0920" min="0" step="any" inputmode="decimal" />
                </div>
            </div>
            <button type="submit" class="edu-calc-submit">Calculate</button>
        </form>
        <div class="edu-calc-result" id="edu-calc-rr-out" aria-live="polite"></div>
    </article>
</div>
