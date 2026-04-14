<?php

/**
 * Home page FAQ content.
 *
 * i18n: English copy is mirrored in locales/en.json under "homeFaq" for client-side translation.
 * After changing structure or wording here, refresh en.json: export this file to JSON, then run
 * node tools/merge-home-faq-en.js (see tools/home-faq-export.json + that script). Then update
 * translated copies in tools/home-faq-translated/*.homeFaq.json and run node tools/merge-home-faq-locales.js
 */
return [
    [
        'label' => 'General Information',
        'intro' => 'Core facts about TraderTok, our markets, and how the platform fits together.',
        'items' => [
            [
                'question' => 'Who is TraderTok?',
                'paragraphs' => [
                    'TraderTok is a global online trading platform providing access to financial markets, including forex, stocks, commodities, indices, and cryptocurrencies.',
                    'The platform is accessible via desktop, mobile, and web, and is designed to support both beginner and experienced traders.',
                    'TraderTok operates under Amber Rock Trade Ltd, authorized and regulated by the Financial Services Commission (FSC) of Mauritius.',
                ],
            ],
            [
                'question' => 'What trading instruments does TraderTok offer?',
                'paragraphs' => [
                    'TraderTok provides access to:',
                ],
                'bullets' => [
                    'Forex (currency pairs)',
                    'Commodities (e.g., gold, oil)',
                    'Stocks from major global exchanges',
                    'Market indices',
                    'Cryptocurrencies',
                ],
                'paragraphs_after' => [
                    'Availability of instruments may vary depending on jurisdiction and regulatory requirements.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Regulation',
        'intro' => 'Licensing and company details.',
        'items' => [
            [
                'question' => 'Is TraderTok regulated?',
                'paragraphs' => [
                    'Yes. TraderTok operates under:',
                ],
                'bullets' => [
                    'Amber Rock Trade Ltd',
                    'Address: Level 5, Alexander House, 35 Cybercity, Ebene, Mauritius',
                    'Company No: 222594',
                    'License No: GB24203892',
                    'Regulator: Financial Services Commission (FSC), Mauritius',
                ],
                'paragraphs_after' => [
                    'Clients are encouraged to verify details via the <a href="https://opr.fscmauritius.org/ords/opr/r/fsc-opr/fsc-online-public-register-opr" target="_blank" rel="noopener noreferrer" class="license-link">FSC public register</a>.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Education & Platform',
        'intro' => 'Learning resources, demo trading, and how to access the platform.',
        'items' => [
            [
                'question' => 'Are educational resources available?',
                'paragraphs' => [
                    'Yes. TraderTok provides educational resources including:',
                ],
                'bullets' => [
                    'Video tutorials',
                    'Training sessions',
                    'Market insights and analysis',
                    'Demo accounts for practice',
                ],
                'paragraphs_after' => [
                    'All educational content is provided for informational purposes only and does not constitute investment advice.',
                ],
            ],
            [
                'question' => 'Can I practice trading before using real money?',
                'paragraphs' => [
                    'Yes. TraderTok offers a demo account with virtual funds, allowing users to trade in real-time market conditions without financial risk.',
                    'Performance in a demo environment does not guarantee similar results in live trading.',
                ],
            ],
            [
                'question' => 'What devices can I use?',
                'paragraphs' => [
                    'TraderTok is available on:',
                ],
                'bullets' => [
                    'Desktop (Windows & Mac)',
                    'Mobile (iOS & Android)',
                    'Web browser',
                ],
                'paragraphs_after' => [
                    'Availability may vary depending on region and technical requirements.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Account & Support',
        'intro' => 'Opening an account, verification, and how to reach our team.',
        'items' => [
            [
                'question' => 'Does TraderTok provide customer support?',
                'paragraphs' => [
                    'Yes. Customer support is available 24/5 via:',
                ],
                'bullets' => [
                    'Live chat',
                    'Email',
                    'Phone',
                    'Website contact form',
                ],
                'paragraphs_after' => [
                    'Response times may vary depending on volume and verification requirements.',
                ],
            ],
            [
                'question' => 'How do I contact support?',
                'paragraphs' => [
                    'Phone: +44 7520 640 890',
                    'Email: support@tradertok.com',
                    'Website contact form',
                ],
                'linkify' => ['email' => 'support@tradertok.com', 'phone' => '+44 7520 640 890'],
            ],
            [
                'question' => 'How do I open an account?',
                'paragraphs' => [
                    'To open an account:',
                ],
                'bullets' => [
                    'Complete the online application',
                    'Verify your identity',
                    'Fund your account',
                    'Start trading',
                ],
                'paragraphs_after' => [
                    'Account approval is subject to compliance review.',
                ],
            ],
            [
                'question' => 'Why do I need to verify my account?',
                'paragraphs' => [
                    'Verification is required to:',
                ],
                'bullets' => [
                    'Comply with financial regulations',
                    'Prevent fraud',
                    'Ensure platform security',
                ],
                'paragraphs_after' => [
                    'Required documents may include:',
                ],
                'bullets_after' => [
                    'Proof of identity',
                    'Phone verification',
                    'Selfie verification',
                ],
                'paragraphs_final' => [
                    'Failure to verify may result in account restrictions.',
                ],
            ],
            [
                'question' => 'What do I need to start?',
                'paragraphs' => [
                    'To open an account, you must:',
                ],
                'bullets' => [
                    'Be at least 18 years old',
                    'Provide valid identification',
                    'Have a verified email and phone number',
                    'Have internet access',
                ],
            ],
        ],
    ],
    [
        'label' => 'Deposits & Withdrawals',
        'intro' => 'Funding your account, withdrawals, and how client money is handled.',
        'items' => [
            [
                'question' => 'How do deposits work?',
                'paragraphs' => [
                    'Deposits can be made via:',
                ],
                'bullets' => [
                    'Bank transfer',
                    'Credit/debit card',
                    'Approved digital wallets',
                ],
                'paragraphs_after' => [
                    'Funds are typically credited within 24 hours, depending on the provider.',
                    'TraderTok may request additional documentation to comply with AML regulations.',
                ],
            ],
            [
                'question' => 'How do withdrawals work?',
                'paragraphs' => [
                    'Withdrawals can be requested via the platform and are typically processed within 24 hours, subject to verification.',
                    'Estimated timelines:',
                ],
                'bullets' => [
                    'Cards: up to 5 business days',
                    'Bank transfer: up to 5 business days',
                    'Wallets: may be instant',
                ],
                'paragraphs_after' => [
                    'TraderTok reserves the right to:',
                ],
                'bullets_after' => [
                    'Return funds to the original payment method',
                    'Request additional verification',
                    'Delay processing for compliance checks',
                ],
            ],
            [
                'question' => 'Is my money protected?',
                'paragraphs' => [
                    'Client funds are held in segregated accounts, separate from company funds.',
                    'Eligible funds may be protected up to USD $100,000, subject to regulatory rules and eligibility criteria.',
                    'TraderTok does not guarantee protection against trading losses.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Fees & Trading',
        'intro' => 'Costs, margin, and how advice is provided.',
        'items' => [
            [
                'question' => 'What are your trading fees?',
                'paragraphs' => [
                    'Micro trades (0.01–0.19 lots): No commission',
                    'Standard trades (0.20–4.99 lots): $1.50 per trade',
                    'Large trades (5.00+ lots): $3.50 per trade',
                    'Commissions apply on trade opening unless otherwise specified.',
                    'TraderTok reserves the right to update its fee structure.',
                ],
            ],
            [
                'question' => 'Are there conversion fees?',
                'paragraphs' => [
                    'Yes. Currency conversion fees may apply when depositing, withdrawing, or trading in different currencies.',
                ],
            ],
            [
                'question' => 'What is margin trading?',
                'paragraphs' => [
                    'Margin trading allows you to trade with borrowed funds, increasing your exposure.',
                    'While it can amplify profits, it also increases risk and may result in losses exceeding your initial deposit.',
                ],
            ],
            [
                'question' => 'Do you provide investment advice?',
                'paragraphs' => [
                    'TraderTok provides self-directed trading accounts.',
                    'Unless explicitly agreed in writing under a regulated advisory agreement, TraderTok does not provide personalized investment advice.',
                ],
            ],
        ],
    ],
    [
        'label' => 'Risk & Compliance',
        'intro' => 'Important risks including crypto and copy trading.',
        'items' => [
            [
                'question' => 'What risks should I be aware of?',
                'paragraphs' => [
                    'Trading involves significant risk and may result in the loss of part or all of your invested capital.',
                    'You should:',
                ],
                'bullets' => [
                    'Understand the risks involved',
                    'Trade only with funds you can afford to lose',
                    'Seek independent financial advice if necessary',
                ],
            ],
            [
                'question' => 'Cryptocurrency risk',
                'paragraphs' => [
                    'Cryptocurrency markets are highly volatile and speculative. Prices can fluctuate significantly in short periods.',
                ],
            ],
            [
                'question' => 'Copy trading risk',
                'paragraphs' => [
                    'Copy trading involves additional risks. You may follow traders with:',
                ],
                'bullets' => [
                    'Different risk tolerance',
                    'Different financial objectives',
                    'Limited experience',
                ],
                'paragraphs_after' => [
                    'Past performance is not indicative of future results.',
                    'Content shared within the platform does not constitute investment advice.',
                ],
            ],
        ],
    ],
    [
        'label' => 'TraderTok Club',
        'intro' => 'Loyalty tiers and benefits.',
        'items' => [
            [
                'question' => 'What is the TraderTok Club?',
                'paragraphs' => [
                    'TraderTok Club is a loyalty program offering tier-based benefits.',
                    'Membership starts from a minimum balance of $5,000 and includes five tiers:',
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
