(function syncOpenDemoAccountPageMeta() {
    function run() {
        if (!window.i18n || !document.getElementById('openDemoAccountPageForm')) {
            return;
        }
        var t = window.i18n.t;
        var pt = t('openDemoAccountPage.meta.pageTitle');
        if (pt && pt !== 'openDemoAccountPage.meta.pageTitle') {
            document.title = pt;
        }
        var pd = t('openDemoAccountPage.meta.pageDescription');
        if (pd && pd !== 'openDemoAccountPage.meta.pageDescription') {
            var md = document.querySelector('meta[name="description"]');
            if (md) md.setAttribute('content', pd);
            var ogd = document.querySelector('meta[property="og:description"]');
            if (ogd) ogd.setAttribute('content', pd);
            var twd = document.querySelector('meta[name="twitter:description"]');
            if (twd) twd.setAttribute('content', pd);
        }
        if (pt && pt !== 'openDemoAccountPage.meta.pageTitle') {
            var ogt = document.querySelector('meta[property="og:title"]');
            if (ogt) ogt.setAttribute('content', pt);
            var twt = document.querySelector('meta[name="twitter:title"]');
            if (twt) twt.setAttribute('content', pt);
        }
    }
    document.addEventListener('DOMContentLoaded', run);
    window.addEventListener('tradertok:i18n-applied', run);
    setTimeout(run, 0);
})();
