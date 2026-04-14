<?php
$url = routeUrl('video-education');
?>
<div class="education-article-panel course-video-promo">
    <p class="education-article-panel-label course-video-promo__kicker">Video learning</p>
    <h3>Watch ideas in motion</h3>
    <p class="course-video-promo__text">
        These Academy courses are built to read at your own pace. When you want demos, walkthroughs, and explainers on screen, Video Education adds a library of tutorials that pairs naturally with what you are studying here.
    </p>
    <a class="course-video-promo__link" href="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>">
        <span class="course-video-promo__play" aria-hidden="true"></span>
        Explore Video Education
    </a>
</div>
