<section class="page-hero">
  <video class="page-hero-video" autoplay loop muted playsinline>
    <source src="assets/images/education.mp4" type="video/mp4">
  </video>
  <div class="page-hero-overlay"></div>

  <div class="container">
    <div class="page-hero-content" style="justify-content: start; align-items: flex-start; text-align: left;">
      <div class="page-hero-badge">
        <span>Help Center</span>
      </div>
      <h1 class="doc-page-hero-title">TRADERTOK HELP CENTER</h1>
      <p class="doc-page-hero-subtitle">
        Find quick answers about TraderTok, account opening, platform access, deposits,
        withdrawals, trading fees, regulation, and support.
      </p>
      <p class="doc-page-hero-subtitle">
        This page is designed to make key information easier to find, easier to understand,
        and easier to act on when you need support.
      </p>
    </div>
  </div>
</section>

<?php
$help_center_sections = [
    [
        'label' => 'General Information',
        'intro' => 'A quick overview of what TraderTok offers and how the platform is positioned.',
        'items' => [
            [
                'question' => 'Who is TraderTok?',
                'answer' => [
                    'TraderTok is a global online trading platform providing access to financial markets, including forex, stocks, commodities, indices, and cryptocurrencies.',
                    'The platform is accessible via desktop, mobile, and web, and is designed to support both beginner and experienced traders.',
                    'TraderTok operates under Amber Rock Trade Ltd, authorized and regulated by the Financial Services Commission (FSC) of Mauritius.',
                ],
            ],
            [
                'question' => 'What trading instruments does TraderTok offer?',
                'answer' => [
                    'TraderTok provides access to forex, commodities such as gold and oil, stocks from major global exchanges, market indices, and cryptocurrencies.',
                    'Availability of instruments may vary depending on jurisdiction and regulatory requirements.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Education & Platform',
        'intro' => 'Useful information for users learning the platform and building confidence before trading live.',
        'items' => [
            [
                'question' => 'Are educational resources available?',
                'answer' => [
                    'Yes. TraderTok provides educational resources including video tutorials, training sessions, market insights and analysis, and demo accounts for practice.',
                    'All educational content is provided for informational purposes only and does not constitute investment advice.',
                ],
            ],
            [
                'question' => 'Can I practice trading before using real money?',
                'answer' => [
                    'Yes. TraderTok offers a demo account with virtual funds, allowing users to trade in real-time market conditions without financial risk.',
                    'Performance in a demo environment does not guarantee similar results in live trading.',
                ],
            ],
            [
                'question' => 'What devices can I use?',
                'answer' => [
                    'TraderTok is available on desktop for Windows and Mac, on mobile for iOS and Android, and through a web browser.',
                    'Availability may vary depending on region and technical requirements.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Account & Support',
        'intro' => 'Key account-opening and support information for new and existing users.',
        'items' => [
            [
                'question' => 'Does TraderTok provide customer support?',
                'answer' => [
                    'Yes. Customer support is available 24/5 via live chat, email, phone, and the website contact form.',
                    'Response times may vary depending on support volume and verification requirements.',
                ],
            ],
            [
                'question' => 'How do I contact support?',
                'answer' => [
                    'Phone: +44 7520 640 890',
                    'Email: support@tradertok.com',
                    'You can also contact the team through the website contact form.',
                ],
            ],
            [
                'question' => 'How do I open an account?',
                'answer' => [
                    'To open an account, complete the online application, verify your identity, fund your account, and then start trading.',
                    'Account approval is subject to compliance review.',
                ],
            ],
            [
                'question' => 'Why do I need to verify my account?',
                'answer' => [
                    'Verification is required to comply with financial regulations, prevent fraud, and help ensure platform security.',
                    'Required documents may include proof of identity, phone verification, and selfie verification.',
                    'Failure to verify may result in account restrictions.',
                ],
            ],
            [
                'question' => 'What do I need to start?',
                'answer' => [
                    'To open an account, you must be at least 18 years old, provide valid identification, have a verified email and phone number, and have internet access.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Deposits & Withdrawals',
        'intro' => 'A simplified look at funding, withdrawals, and the checks that may apply.',
        'items' => [
            [
                'question' => 'How do deposits work?',
                'answer' => [
                    'Deposits can be made via bank transfer, credit or debit card, and approved digital wallets.',
                    'Funds are typically credited within 24 hours, depending on the provider.',
                    'TraderTok may request additional documentation to comply with AML regulations.',
                ],
            ],
            [
                'question' => 'How do withdrawals work?',
                'answer' => [
                    'Withdrawals can be requested via the platform and are typically processed within 24 hours, subject to verification.',
                    'Estimated timelines are up to 5 business days for cards, up to 5 business days for bank transfer, and wallets may be instant.',
                    'TraderTok reserves the right to return funds to the original payment method, request additional verification, or delay processing for compliance checks.',
                ],
            ],
            [
                'question' => 'Is my money protected?',
                'answer' => [
                    'Client funds are held in segregated accounts, separate from company funds.',
                    'Eligible funds may be protected up to USD $100,000, subject to regulatory rules and eligibility criteria.',
                    'TraderTok does not guarantee protection against trading losses.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Fees & Trading',
        'intro' => 'Important cost and product information that users should understand before trading.',
        'items' => [
            [
                'question' => 'What are your trading fees?',
                'answer' => [
                    'Micro trades from 0.01 to 0.19 lots have no commission.',
                    'Standard trades from 0.20 to 4.99 lots are charged at $1.50 per trade.',
                    'Large trades from 5.00 lots and above are charged at $3.50 per trade.',
                    'Commissions apply on trade opening unless otherwise specified. TraderTok reserves the right to update its fee structure.',
                ],
            ],
            [
                'question' => 'Are there conversion fees?',
                'answer' => [
                    'Yes. Currency conversion fees may apply when depositing, withdrawing, or trading in different currencies.',
                ],
            ],
            [
                'question' => 'What is margin trading?',
                'answer' => [
                    'Margin trading allows you to trade with borrowed funds, increasing your exposure.',
                    'While it can amplify profits, it also increases risk and may result in losses exceeding your initial deposit.',
                ],
            ],
            [
                'question' => 'Do you provide investment advice?',
                'answer' => [
                    'TraderTok provides self-directed trading accounts.',
                    'Unless explicitly agreed in writing under a regulated advisory agreement, TraderTok does not provide personalized investment advice.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Risk & Compliance',
        'intro' => 'A clear reminder that trading involves risk and requires informed decision-making.',
        'items' => [
            [
                'question' => 'What risks should I be aware of?',
                'answer' => [
                    'Trading involves significant risk and may result in the loss of part or all of your invested capital.',
                    'You should understand the risks involved, trade only with funds you can afford to lose, and seek independent financial advice if necessary.',
                ],
            ],
            [
                'question' => 'What is cryptocurrency risk?',
                'answer' => [
                    'Cryptocurrency markets are highly volatile and speculative. Prices can fluctuate significantly in short periods.',
                ],
            ],
            [
                'question' => 'What is copy trading risk?',
                'answer' => [
                    'Copy trading involves additional risks. You may follow traders with different risk tolerance, different financial objectives, or limited experience.',
                    'Past performance is not indicative of future results, and content shared within the platform does not constitute investment advice.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Regulation',
        'intro' => 'Core company and licensing details presented in one place.',
        'items' => [
            [
                'question' => 'Is TraderTok regulated?',
                'answer' => [
                    'Yes. TraderTok operates under Amber Rock Trade Ltd.',
                    'Address: Level 5, Alexander House, 35 Cybercity, Ebene, Mauritius.',
                    'Company No: 222594.',
                    'License No: GB24203892.',
                    'Regulator: Financial Services Commission (FSC), Mauritius.',
                    'Clients are encouraged to verify details via the FSC register.',
                ],
            ],
        ],
    ],
    [
        'label' => 'TraderTok Club',
        'intro' => 'An overview of the loyalty program and how benefits progress across tiers.',
        'items' => [
            [
                'question' => 'What is the TraderTok Club?',
                'answer' => [
                    'TraderTok Club is a loyalty program offering tier-based benefits. Membership starts from a minimum balance of $5,000 and includes five tiers.',
                ],
                'lists' => [
                    [
                        'title' => 'Silver',
                        'items' => ['Webinars', 'Partner apps', 'Dedicated account manager'],
                    ],
                    [
                        'title' => 'Gold',
                        'items' => ['All Silver benefits', 'Interest on balance', 'Weekly market insights', 'WhatsApp access to account manager'],
                    ],
                    [
                        'title' => 'Platinum',
                        'items' => ['All Gold benefits', 'No withdrawal fees', 'Premium content access'],
                    ],
                    [
                        'title' => 'Platinum+',
                        'items' => ['Event invitations', 'TraderTok Card', 'Enhanced platform benefits'],
                    ],
                    [
                        'title' => 'Diamond',
                        'items' => ['Full premium access', 'Fee exemptions', 'Exclusive privileges'],
                    ],
                ],
            ],
        ],
    ],
];
?>

<section class="help-center-page">
  <div class="container">
    <div class="help-center-overview">
      <article class="help-center-overview-card help-center-overview-card--primary">
        <div class="help-center-eyebrow">FAQs</div>
        <h2>Answers arranged around the questions users ask most</h2>
        <p>
          We have grouped the most important information into clear sections so users can quickly
          find practical answers without reading through repeated policy language.
        </p>
        <p>
          Key questions also appear on the <a class="license-link" href="./#home-faq">home page</a> for quick access.
        </p>
      </article>

      <article class="help-center-overview-card">
        <div class="help-center-eyebrow">Need Direct Help?</div>
        <h2>Contact the support team</h2>
        <div class="help-center-contact-grid">
          <div class="help-center-contact-item">
            <span>Email</span>
            <a class="license-link" href="mailto:support@tradertok.com">support@tradertok.com</a>
          </div>
          <div class="help-center-contact-item">
            <span>Phone</span>
            <a class="license-link" href="tel:+447520640890">+44 7520 640 890</a>
          </div>
        </div>
      </article>
    </div>

    <div class="help-center-section-nav">
      <?php foreach ($help_center_sections as $index => $section): ?>
        <a href="#help-section-<?php echo $index + 1; ?>" class="help-center-nav-link"><?php echo htmlspecialchars($section['label']); ?></a>
      <?php endforeach; ?>
      <a href="#help-center-glossary" class="help-center-nav-link">Glossary</a>
    </div>

    <?php foreach ($help_center_sections as $sectionIndex => $section): ?>
      <section class="help-center-section-card" id="help-section-<?php echo $sectionIndex + 1; ?>">
        <div class="help-center-section-header">
          <div class="help-center-eyebrow"><?php echo htmlspecialchars($section['label']); ?></div>
          <h2><?php echo htmlspecialchars($section['label']); ?></h2>
          <p><?php echo htmlspecialchars($section['intro']); ?></p>
        </div>

        <div class="help-center-faq-list">
          <?php foreach ($section['items'] as $itemIndex => $item): ?>
            <article class="help-center-faq-item<?php echo ($itemIndex === 0) ? ' is-open' : ''; ?>">
              <button class="help-center-faq-question" type="button" aria-expanded="<?php echo ($itemIndex === 0) ? 'true' : 'false'; ?>">
                <span><?php echo htmlspecialchars($item['question']); ?></span>
                <span class="help-center-faq-icon" aria-hidden="true"></span>
              </button>
              <div class="help-center-faq-answer">
                <?php foreach ($item['answer'] as $paragraph): ?>
                  <p>
                    <?php if (strpos($paragraph, 'support@tradertok.com') !== false): ?>
                      <?php echo str_replace('support@tradertok.com', '<a class="license-link" href="mailto:support@tradertok.com">support@tradertok.com</a>', htmlspecialchars($paragraph)); ?>
                    <?php elseif (strpos($paragraph, '+44 7520 640 890') !== false): ?>
                      <?php echo str_replace('+44 7520 640 890', '<a class="license-link" href="tel:+447520640890">+44 7520 640 890</a>', htmlspecialchars($paragraph)); ?>
                    <?php else: ?>
                      <?php echo htmlspecialchars($paragraph); ?>
                    <?php endif; ?>
                  </p>
                <?php endforeach; ?>
                <?php if (!empty($item['lists'])): ?>
                  <div class="help-center-tier-grid">
                    <?php foreach ($item['lists'] as $list): ?>
                      <div class="help-center-tier-card">
                        <h3><?php echo htmlspecialchars($list['title']); ?></h3>
                        <ul>
                          <?php foreach ($list['items'] as $listItem): ?>
                            <li><?php echo htmlspecialchars($listItem); ?></li>
                          <?php endforeach; ?>
                        </ul>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>
    <?php endforeach; ?>

    <?php
    $help_center_glossary = [
        'A' => [
            ['term' => 'Ask Price', 'definition' => 'The price at which a trader can buy a currency pair. Also known as the offer price.'],
            ['term' => 'Asset', 'definition' => 'Any financial instrument that can be traded, including currencies, commodities, indices, and stocks.'],
            ['term' => 'Automated Trading', 'definition' => 'Trading executed automatically using algorithms, trading bots, or Expert Advisors (EAs) without manual intervention.'],
        ],
        'B' => [
            ['term' => 'Balance', 'definition' => 'The total amount of funds in a trading account, excluding any open trade profits or losses.'],
            ['term' => 'Base Currency', 'definition' => 'The first currency in a currency pair. For example, in EUR/USD, EUR is the base currency.'],
            ['term' => 'Bear Market', 'definition' => 'A market condition characterized by declining prices.'],
            ['term' => 'Bid Price', 'definition' => 'The price at which a trader can sell a currency pair.'],
            ['term' => 'Broker', 'definition' => 'A company or platform that provides access to financial markets for trading.'],
            ['term' => 'Bull Market', 'definition' => 'A market condition characterized by rising prices.'],
        ],
        'C' => [
            ['term' => 'Candlestick Chart', 'definition' => 'A chart type that displays price movements using candlesticks, showing open, high, low, and close prices.'],
            ['term' => 'CFD (Contract for Difference)', 'definition' => 'A derivative product that allows traders to speculate on price movements without owning the underlying asset.'],
            ['term' => 'Commission', 'definition' => 'A fee charged by a broker for executing trades.'],
            ['term' => 'Currency Pair', 'definition' => 'Two currencies traded against each other, such as EUR/USD or GBP/JPY.'],
        ],
        'D' => [
            ['term' => 'Demo Account', 'definition' => 'A practice account using virtual funds, allowing traders to learn without financial risk.'],
            ['term' => 'Drawdown', 'definition' => 'The reduction in account balance from a peak to a lowest point during trading.'],
        ],
        'E' => [
            ['term' => 'ECN (Electronic Communication Network)', 'definition' => 'A type of broker that connects traders directly with liquidity providers, offering tighter spreads and faster execution.'],
            ['term' => 'Equity', 'definition' => 'The real-time value of a trading account, including open trade profits and losses.'],
            ['term' => 'Execution', 'definition' => 'The process of completing a buy or sell order in the market.'],
        ],
        'F' => [
            ['term' => 'Forex (FX)', 'definition' => 'The global marketplace for trading currencies.'],
            ['term' => 'Fundamental Analysis', 'definition' => 'A method of analyzing markets using economic data, news events, and financial indicators.'],
        ],
        'G' => [
            ['term' => 'Gap', 'definition' => 'A price movement where the market jumps between levels without trading in between.'],
        ],
        'H' => [
            ['term' => 'Hedge', 'definition' => 'A strategy used to reduce risk by opening positions that offset potential losses.'],
        ],
        'I' => [
            ['term' => 'Index', 'definition' => 'A measurement of the performance of a group of stocks, such as the S&P 500.'],
            ['term' => 'Indicator', 'definition' => 'A tool used in technical analysis to identify trends and potential trading opportunities.'],
        ],
        'L' => [
            ['term' => 'Leverage', 'definition' => 'Borrowed capital provided by a broker that allows traders to control larger positions with smaller investments.'],
            ['term' => 'Liquidity', 'definition' => 'The ease with which an asset can be bought or sold without affecting its price.'],
            ['term' => 'Liquidity Provider', 'definition' => 'Financial institutions that supply market prices and execute trades.'],
            ['term' => 'Lot', 'definition' => 'A standardized unit of trading volume in forex. Standard lot = 100,000 units, mini lot = 10,000 units, micro lot = 1,000 units.'],
            ['term' => 'Lot Size Calculator', 'definition' => 'A tool used to determine appropriate position size based on risk.'],
        ],
        'M' => [
            ['term' => 'Margin', 'definition' => 'The required capital to open and maintain a leveraged position.'],
            ['term' => 'Margin Call', 'definition' => 'A notification from a broker requiring additional funds or position closure due to insufficient margin.'],
            ['term' => 'Market Order', 'definition' => 'An order executed immediately at the current market price.'],
        ],
        'O' => [
            ['term' => 'Open Position', 'definition' => 'A trade that has been executed but not yet closed.'],
            ['term' => 'Order', 'definition' => 'An instruction to buy or sell a financial instrument.'],
            ['term' => 'Overtrading', 'definition' => 'Excessive trading that increases risk and often reduces profitability.'],
        ],
        'P' => [
            ['term' => 'Pending Order', 'definition' => 'An order set to execute at a future price level, such as a Buy Limit or Sell Limit.'],
            ['term' => 'Pip (Percentage in Point)', 'definition' => 'The smallest standard price movement in a currency pair, typically 0.0001.'],
            ['term' => 'Position Size', 'definition' => 'The volume or number of units traded in a position.'],
            ['term' => 'Profit / Loss (P/L)', 'definition' => 'The financial outcome of a trade.'],
        ],
        'R' => [
            ['term' => 'Resistance', 'definition' => 'A price level where upward movement tends to slow or reverse.'],
            ['term' => 'Risk Management', 'definition' => 'Strategies used to minimize losses and protect trading capital.'],
            ['term' => 'Risk-Reward Ratio', 'definition' => 'The ratio between potential profit and potential loss in a trade.'],
        ],
        'S' => [
            ['term' => 'Scalping', 'definition' => 'A short-term trading strategy aiming to profit from small price movements.'],
            ['term' => 'Slippage', 'definition' => 'The difference between the expected price of a trade and the actual executed price.'],
            ['term' => 'Spread', 'definition' => 'The difference between the bid and ask price.'],
            ['term' => 'Stop Loss', 'definition' => 'An order to automatically close a trade at a specified loss level.'],
            ['term' => 'Support', 'definition' => 'A price level where downward movement tends to slow or reverse.'],
            ['term' => 'Swap', 'definition' => 'An overnight interest fee or credit applied to positions held overnight.'],
        ],
        'T' => [
            ['term' => 'Take Profit', 'definition' => 'An order that automatically closes a trade once a target profit level is reached.'],
            ['term' => 'Technical Analysis', 'definition' => 'A method of analyzing price movements using charts, patterns, and indicators.'],
            ['term' => 'Trading Platform', 'definition' => 'Software used to execute trades and analyze markets, such as MT4 or MT5.'],
            ['term' => 'Trading Session', 'definition' => 'Specific periods when markets are active, such as London or New York sessions.'],
        ],
        'V' => [
            ['term' => 'Volatility', 'definition' => 'The degree of price fluctuation in a market.'],
        ],
        'W' => [
            ['term' => 'Withdrawal', 'definition' => 'The process of transferring funds from a trading account to a personal account.'],
        ],
    ];
    ?>

    <section class="help-center-section-card help-center-section-card--glossary" id="help-center-glossary">
      <div class="help-center-section-header">
        <div class="help-center-eyebrow">TraderTok Glossary</div>
        <h2>Forex Trading Glossary</h2>
        <p>
          This glossary keeps the most important trading terms in one place using clearer,
          client-friendly definitions that work for education, onboarding, and ongoing support.
        </p>
      </div>

      <div class="help-center-glossary-intro-grid">
        <article class="help-center-glossary-highlight">
          <h3>Why this section matters</h3>
          <p>
            Many questions in support and onboarding come down to vocabulary. This section helps users
            understand the language used across the platform, account pages, courses, and trading tools.
          </p>
        </article>
        <article class="help-center-glossary-highlight">
          <h3>What you will find here</h3>
          <p>
            Core forex terms, platform language, risk-related concepts, and practical trading definitions
            presented in an easier format to scan and revisit.
          </p>
        </article>
      </div>

      <div class="help-center-glossary-index">
        <?php foreach ($help_center_glossary as $letter => $terms): ?>
          <a href="#glossary-letter-<?php echo strtolower($letter); ?>"><?php echo htmlspecialchars($letter); ?></a>
        <?php endforeach; ?>
      </div>

      <?php foreach ($help_center_glossary as $letter => $terms): ?>
        <section class="help-center-glossary-group" id="glossary-letter-<?php echo strtolower($letter); ?>">
          <div class="help-center-glossary-letter"><?php echo htmlspecialchars($letter); ?></div>
          <div class="help-center-glossary-grid">
            <?php foreach ($terms as $term): ?>
              <article class="help-center-glossary-card">
                <h3><?php echo htmlspecialchars($term['term']); ?></h3>
                <p><?php echo htmlspecialchars($term['definition']); ?></p>
              </article>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endforeach; ?>
    </section>

    <article class="help-center-important-note">
      <div class="help-center-eyebrow">Important Notice</div>
      <h2>Educational information, not investment advice</h2>
      <p>
        This information is provided for educational purposes only and does not constitute financial
        or investment advice.
      </p>
    </article>
  </div>
</section>

<style>
.help-center-page {
  padding: 80px 0 110px;
  background:
    radial-gradient(circle at top right, rgba(230, 57, 70, 0.08), transparent 28%),
    linear-gradient(180deg, var(--bg-secondary) 0%, var(--bg-primary) 100%);
}

.help-center-overview {
  display: grid;
  grid-template-columns: 1.15fr 0.85fr;
  gap: 24px;
  margin-bottom: 28px;
}

.help-center-overview-card,
.help-center-section-card,
.help-center-important-note {
  background: var(--card-bg);
  border: 1px solid var(--card-border);
  border-radius: 28px;
  padding: 32px;
  box-shadow: 0 18px 40px var(--shadow-color);
}

.help-center-overview-card--primary,
.help-center-important-note {
  background: linear-gradient(180deg, rgba(230, 57, 70, 0.08) 0%, var(--card-bg) 100%);
}

.help-center-eyebrow {
  display: none;
}

.help-center-overview-card h2,
.help-center-section-card h2,
.help-center-important-note h2,
.help-center-tier-card h3 {
  color: #ff6b35;
  line-height: 1.3;
}

.help-center-overview-card h2,
.help-center-section-card h2,
.help-center-important-note h2 {
  font-size: clamp(1.85rem, 4vw, 2.2rem);
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
  margin-bottom: 14px;
}

.help-center-overview-card p,
.help-center-section-header p,
.help-center-faq-answer p,
.help-center-important-note p,
.help-center-tier-card li {
  color: var(--text-secondary);
  font-size: 1rem;
  line-height: 1.8;
}

.help-center-contact-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 16px;
  margin-top: 24px;
}

.help-center-contact-item {
  padding: 20px 22px;
  border-radius: 20px;
  background: var(--bg-secondary);
  border: 1px solid var(--card-border);
}

.help-center-contact-item span {
  display: block;
  color: var(--text-tertiary);
  font-size: 0.9rem;
  margin-bottom: 8px;
}

.help-center-section-nav {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  margin-bottom: 28px;
}

.help-center-nav-link {
  display: inline-flex;
  align-items: center;
  padding: 12px 18px;
  border-radius: 999px;
  background: var(--card-bg);
  border: 1px solid var(--card-border);
  color: var(--text-secondary);
  font-size: 0.95rem;
  text-decoration: none;
  transition: border-color 0.2s ease, transform 0.2s ease, color 0.2s ease;
}

.help-center-nav-link:hover {
  color: var(--text-primary);
  border-color: rgba(255, 90, 54, 0.45);
  transform: translateY(-2px);
}

.help-center-section-card {
  margin-bottom: 24px;
}

.help-center-section-header {
  margin-bottom: 20px;
}

.help-center-faq-list {
  display: grid;
  gap: 14px;
}

.help-center-faq-item {
  border-radius: 22px;
  border: 1px solid var(--card-border);
  background: var(--bg-secondary);
  overflow: hidden;
}

.help-center-faq-question {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 18px;
  background: transparent;
  border: 0;
  padding: 22px 24px;
  color: var(--text-primary);
  font-size: clamp(1.15rem, 2.3vw, 1.35rem);
  font-weight: 700;
  text-align: left;
  cursor: pointer;
}

.help-center-faq-icon {
  position: relative;
  width: 16px;
  height: 16px;
  flex: 0 0 16px;
}

.help-center-faq-icon::before,
.help-center-faq-icon::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 14px;
  height: 2px;
  background: #ff5a36;
  border-radius: 999px;
  transform: translate(-50%, -50%);
  transition: transform 0.2s ease, opacity 0.2s ease;
}

.help-center-faq-icon::after {
  transform: translate(-50%, -50%) rotate(90deg);
}

.help-center-faq-item.is-open .help-center-faq-icon::after {
  opacity: 0;
  transform: translate(-50%, -50%) rotate(90deg) scaleX(0.3);
}

.help-center-faq-answer {
  display: none;
  padding: 0 24px 24px;
}

.help-center-faq-item.is-open .help-center-faq-answer {
  display: block;
}

.help-center-faq-answer p {
  margin: 0 0 12px;
}

.help-center-tier-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 16px;
  margin-top: 18px;
}

.help-center-tier-card {
  padding: 20px 22px;
  border-radius: 20px;
  background: var(--bg-secondary);
  border: 1px solid var(--card-border);
}

.help-center-tier-card h3 {
  font-size: clamp(1.15rem, 2.3vw, 1.3rem);
  margin-bottom: 12px;
  text-transform: none;
  letter-spacing: normal;
}

.help-center-tier-card ul {
  margin: 0;
  padding-left: 18px;
}

.help-center-tier-card li {
  margin-bottom: 8px;
}

.help-center-section-card--glossary {
  scroll-margin-top: 120px;
}

.help-center-glossary-intro-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 18px;
  margin-bottom: 24px;
}

.help-center-glossary-highlight,
.help-center-glossary-card {
  padding: 22px;
  border-radius: 22px;
  background: var(--bg-secondary);
  border: 1px solid var(--card-border);
}

.help-center-glossary-highlight h3,
.help-center-glossary-card h3 {
  color: var(--text-primary);
  font-size: clamp(1.15rem, 2.3vw, 1.3rem);
  line-height: 1.4;
  margin-bottom: 10px;
}

.help-center-glossary-highlight p,
.help-center-glossary-card p {
  color: var(--text-secondary);
  font-size: 0.98rem;
  line-height: 1.8;
}

.help-center-glossary-index {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 28px;
}

.help-center-glossary-index a {
  display: inline-flex;
  width: 42px;
  height: 42px;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  text-decoration: none;
  color: var(--text-primary);
  font-weight: 700;
  background: var(--card-bg);
  border: 1px solid var(--card-border);
  transition: border-color 0.2s ease, transform 0.2s ease, background 0.2s ease;
}

.help-center-glossary-index a:hover {
  border-color: rgba(255, 90, 54, 0.45);
  background: rgba(255, 90, 54, 0.08);
  transform: translateY(-2px);
}

.help-center-glossary-group {
  margin-bottom: 28px;
  scroll-margin-top: 120px;
}

.help-center-glossary-letter {
  color: #ff5a36;
  font-size: 1.35rem;
  font-weight: 800;
  letter-spacing: 0.08em;
  margin-bottom: 14px;
}

.help-center-glossary-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 16px;
}

@media (max-width: 980px) {
  .help-center-overview,
  .help-center-contact-grid,
  .help-center-tier-grid,
  .help-center-glossary-intro-grid,
  .help-center-glossary-grid {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 640px) {
  .help-center-page {
    padding: 64px 0 90px;
  }

  .help-center-overview-card,
  .help-center-section-card,
  .help-center-important-note {
    padding: 26px 22px;
    border-radius: 24px;
  }

  .help-center-faq-question,
  .help-center-faq-answer {
    padding-left: 20px;
    padding-right: 20px;
  }

  .help-center-faq-question {
    font-size: 1rem;
  }
}
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.help-center-faq-question').forEach(function (button) {
      button.addEventListener('click', function () {
        var item = button.closest('.help-center-faq-item');
        var isOpen = item.classList.contains('is-open');

        item.classList.toggle('is-open', !isOpen);
        button.setAttribute('aria-expanded', String(!isOpen));
      });
    });
  });
</script>
