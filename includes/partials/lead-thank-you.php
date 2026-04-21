<?php
$kind = isset($_GET['kind']) ? preg_replace('/[^a-z]/', '', strtolower((string) $_GET['kind'])) : '';
$allowed = ['ebook', 'webinar', 'demo', 'live', 'claim'];
if (!in_array($kind, $allowed, true)) {
    $kind = 'default';
}

$copy = [
    'ebook' => [
        'title' => 'Thank you',
        'body' => [
            'Your request has been received.',
            'We\'ve sent your download link to your email. Please check your inbox (and spam folder if you don\'t see it).',
        ],
    ],
    'webinar' => [
        'title' => 'Thank you',
        'body' => 'Your webinar interest has been recorded. We will use your details to share upcoming sessions and updates.',
    ],
    'demo' => [
        'title' => 'Thank you — check your email',
        'body' => [
            'We’ve received your demo account registration.',
            'We’ve sent you an email to confirm your registration. Please open it and complete email validation (check spam or promotions folders if you don’t see it).',
            'After your email is validated, sign in to your client portal to continue with KYC verification and funding when you’re ready.',
        ],
    ],
    'live' => [
        'title' => 'Thank you — check your email',
        'body' => [
            'We’ve received your live account registration.',
            'We’ve sent you an email to confirm your registration. Please open it and complete email validation (check spam or promotions folders if you don’t see it).',
            'After your email is validated, sign in to your client portal to continue with KYC verification and deposit.',
        ],
    ],
    'claim' => [
        'title' => 'Thank you — we’ve received your claim',
        'body' => [
            'Your offer claim has been submitted successfully.',
            'Our team will review your details and contact you shortly with next steps to activate your promotion.',
        ],
    ],
    'default' => [
        'title' => 'Thank you',
        'body' => 'Your request has been received.',
    ],
];

$topic = isset($_GET['topic']) ? htmlspecialchars((string) $_GET['topic'], ENT_QUOTES, 'UTF-8') : '';
$headline = $copy[$kind]['title'] ?? $copy['default']['title'];
$body = $copy[$kind]['body'] ?? $copy['default']['body'];
if (!is_array($body)) {
    $body = [$body];
}
?>

<section class="education-subpage education-subpage--thank-you">
    <section class="education-subpage-hero education-subpage-hero--thank-you">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">Confirmation</div>
            <h1 class="education-subpage-title"><?php echo htmlspecialchars($headline); ?></h1>
            <?php foreach ($body as $paragraph) : ?>
                <p class="education-subpage-subtitle"><?php echo htmlspecialchars($paragraph); ?></p>
            <?php endforeach; ?>
            <?php if ($topic !== '' && $kind === 'ebook'): ?>
                <p class="education-subpage-subtitle education-thank-you-topic">Selected guide: <strong><?php echo $topic; ?></strong></p>
            <?php endif; ?>
            <?php if ($kind === 'demo' || $kind === 'live' || $kind === 'claim'): ?>
                <?php include __DIR__ . '/education-subpage-hero-ctas-thank-you-lead.php'; ?>
            <?php else: ?>
                <?php include __DIR__ . '/education-subpage-hero-ctas.php'; ?>
            <?php endif; ?>
        </div>
    </section>

    <?php if ($kind !== 'demo' && $kind !== 'live' && $kind !== 'claim'): ?>
    <section class="education-subpage-content">
        <div class="container">
            <div class="education-thank-you-actions">
                <a href="<?php echo htmlspecialchars(routeUrl('education-hub')); ?>" class="education-article-link">Back to Education Hub</a>
                <a href="<?php echo htmlspecialchars(routeUrl('courses')); ?>" class="education-article-link">Browse courses</a>
            </div>
        </div>
    </section>
    <?php endif; ?>
</section>
