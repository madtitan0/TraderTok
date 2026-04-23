<?php

/**
 * Academy pages that require the sign-in / sign-up modal before access (per navigation; see education-lead-gate.js).
 * Keep in sync with assets/js/education-lead-gate.js EDU_GATE_SLUGS.
 * Note: `education-article` is not gated so article URLs resolve correctly; Trading Essentials still uses the modal in JS before navigation when locked.
 */
return [
    // Education Hub section destinations (8) + course lesson pages
    'courses',
    'trading-essentials',
    'edu-market-news',
    'edu-ebooks',
    'edu-webinars',
    'edu-glossary',
    'edu-tutorials',
    'edu-resources',
    // Course lesson pages (linked from Courses)
    'forex-trading-fundamentals',
    'cfd-trading-basics',
    'leverage-margin-risk-basics',
    'risk-management-essentials',
    'technical-analysis-for-beginners',
    'fundamental-analysis-basics',
    'trading-psychology-basics',
    'gold-trading-for-beginners',
    'indices-trading-basics',
    'platform-basics',
];
