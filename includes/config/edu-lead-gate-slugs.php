<?php

/**
 * Academy pages that require lead form (localStorage eduHub_form_submitted) before access.
 * Keep in sync with assets/js/education-lead-gate.js EDU_GATE_SLUGS.
 * Note: `education-article` is not gated so article URLs resolve correctly; Trading Essentials still uses the modal in JS before navigation when locked.
 */
return [
    // Header / hub primary destinations (6)
    'courses',
    'trading-essentials',
    'edu-market-news',
    'edu-ebooks',
    'edu-webinars',
    'edu-glossary',
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
