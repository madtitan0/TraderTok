<?php
$kind = isset($_GET['kind']) ? preg_replace('/[^a-z]/', '', strtolower((string) $_GET['kind'])) : '';
$allowed = ['ebook', 'webinar', 'demo', 'live'];
if (!in_array($kind, $allowed, true)) {
    $kind = 'default';
}

$copy = [
    'ebook' => [
        'title' => 'Thank you',
        'body' => 'Your eBook request has been received. If email delivery is connected, you will receive your download link shortly.',
    ],
    'webinar' => [
        'title' => 'Thank you',
        'body' => 'Your webinar interest has been recorded. We will use your details to share upcoming sessions and updates.',
    ],
    'demo' => [
        'title' => 'Demo request received',
        'body' => 'Thank you. We have received your demo account request. A member of the team will follow up with next steps to access your practice environment.',
    ],
    'live' => [
        'title' => 'Live account request received',
        'body' => 'Thank you. We have received your live account request. Someone will contact you about eligibility, documentation, and onboarding.',
    ],
    'default' => [
        'title' => 'Thank you',
        'body' => 'Your request has been received.',
    ],
];

$topic = isset($_GET['topic']) ? htmlspecialchars((string) $_GET['topic'], ENT_QUOTES, 'UTF-8') : '';
$headline = $copy[$kind]['title'] ?? $copy['default']['title'];
$body = $copy[$kind]['body'] ?? $copy['default']['body'];
?>

<section class="education-subpage education-subpage--thank-you">
    <section class="education-subpage-hero education-subpage-hero--thank-you">
        <div class="page-hero-overlay1"></div>
        <div class="education-subpage-hero-inner container">
            <div class="education-subpage-eyebrow">Confirmation</div>
            <h1 class="education-subpage-title"><?php echo htmlspecialchars($headline); ?></h1>
            <p class="education-subpage-subtitle"><?php echo htmlspecialchars($body); ?></p>
            <?php if ($topic !== '' && $kind === 'ebook'): ?>
                <p class="education-subpage-subtitle education-thank-you-topic">Selected guide: <strong><?php echo $topic; ?></strong></p>
            <?php endif; ?>
            <?php include __DIR__ . '/education-subpage-hero-ctas.php'; ?>
        </div>
    </section>

    <section class="education-subpage-content">
        <div class="container">
            <div class="education-thank-you-actions">
                <a href="<?php echo htmlspecialchars(routeUrl('education-hub')); ?>" class="education-article-link">Back to Education Hub</a>
                <a href="<?php echo htmlspecialchars(routeUrl('courses')); ?>" class="education-article-link">Browse courses</a>
            </div>
        </div>
    </section>
</section>
