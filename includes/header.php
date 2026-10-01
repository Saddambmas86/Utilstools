<?php
// includes/header.php
include_once __DIR__ . '/config.php';
// Ensure $brandIcons is available to templates that expect it
if (!isset($brandIcons) && isset($GLOBALS['brandIcons']) && is_array($GLOBALS['brandIcons'])) {
    $brandIcons = $GLOBALS['brandIcons'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= htmlspecialchars(empty($page_title) ? "$site_name - $default_title_suffix" : "$page_title | $site_name") ?>
    </title>
    <meta name="description" content="<?php echo $page_description; ?>">
    <meta name="keywords" content="<?php echo $page_keywords; ?>">
    <?php
    // Canonical URL: prefer explicit $canonical_url, else build from canonical_base_url (forces https when configured)
    if (isset($canonical_url) && !empty($canonical_url)) {
        $canonical_to_print = $canonical_url;
    } else {
        $request_path_only = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = rtrim($request_path_only, '/');
        // root -> keep base
        if ($path === '') {
            $canonical_to_print = rtrim($canonical_base_url, '/');
        } else {
            $canonical_to_print = rtrim($canonical_base_url, '/') . '/' . ltrim($path, '/');
        }
    }
    echo '<link rel="canonical" href="' . htmlspecialchars($canonical_to_print) . '">';
    ?>

    <meta name="author" content="WordsCompare">
    <meta name="robots" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= htmlspecialchars($site_name) ?>">
    <meta property="og:title" content="<?= htmlspecialchars(empty($page_title) ? $site_name : $page_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars(empty($page_description) ? '' : $page_description) ?>">
    <meta property="og:url" content="<?= htmlspecialchars(isset($canonical_url) && !empty($canonical_url) ? $canonical_url : (isset(
$canonical_to_print) ? $canonical_to_print : ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"))) ?>">
    <meta property="og:image" content="<?= isset($og_image) ? $og_image : $base_url . 'assets/img/og-image.png' ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars(empty($page_title) ? $site_name : $page_title) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars(empty($page_description) ? '' : $page_description) ?>">
    <meta name="twitter:image" content="<?= isset($og_image) ? $og_image : $base_url . 'assets/img/og-image.png' ?>">
    <meta name='theme-color' content='#FF2D55' />

    <!-- Resource Hints -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://pagead2.googlesyndication.com">

    <!-- Bootstrap CSS (Critical) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css?v=<?php echo filemtime(__DIR__ . '/../assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/homepage.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/design-system.css?v=<?php echo filemtime(__DIR__ . '/../assets/css/design-system.css'); ?>">
    
    <style>
        /* Remove dropdown arrows from navigation - Bootstrap 5
        #developerToolsDropdown.dropdown-toggle::after,
        #developerToolsDropdown.dropdown-toggle::before,
        #pdfToolsDropdown.dropdown-toggle::after,
        #pdfToolsDropdown.dropdown-toggle::before,
        #calculatorDropdown.dropdown-toggle::after,
        #calculatorDropdown.dropdown-toggle::before {
            display: none !important;
            content: none !important;
            border: none !important;
        } */
        
        /* Also target by data attribute */
        a[data-bs-toggle="dropdown"]::after {
            display: none !important;
            content: none !important;
            border: none !important;
        }
        
        /* Fix navbar alignment */
        .navbar {
            align-items: center !important;
        }
        
        .navbar-brand {
            margin-right: 0 !important;
            padding-right: 0 !important;
            display: inline-flex !important;
            align-items: center !important;
            height: auto !important;
        }
        
        .navbar .nav-link {
            padding-top: 0.5rem !important;
            padding-bottom: 0.5rem !important;
            display: inline-flex !important;
            align-items: center !important;
            height: auto !important;
        }
        
        .navbar .container-fluid {
            display: flex !important;
            align-items: center !important;
        }
        
        /* Ensure Home link aligns properly with brand */
        .navbar > .container-fluid > a[href="<?php echo $base_url; ?>"]:first-child {
            display: inline-flex !important;
            align-items: center !important;
            margin-right: 8px !important;
        }
    </style>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo $base_url; ?>assets/img/wordscompare-mark.svg?v=<?php echo filemtime(__DIR__ . '/../assets/img/wordscompare-mark.svg'); ?>" type="image/svg+xml">

    <!-- Schema Markup -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "WordsCompare",
        "url": "https://www.wordscompare.com",
        "logo": "https://www.wordscompare.com/assets/img/wordscompare-mark.svg",
        "description": "Compare. Calculate. Create. Free online tools for documents, text, and data.",
        "sameAs": []
    }
    </script>

    <!-- WebSite schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "url": "<?php echo rtrim($canonical_base_url, '/'); ?>",
        "name": "<?php echo htmlspecialchars($site_name); ?>",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?php echo rtrim($canonical_base_url, '/'); ?>/?s={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>

    <?php
    // If this request maps to a content guide in views/content, emit Article schema
    $req_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $maybe_slug = trim($req_path, '/');
    $content_file = __DIR__ . '/../views/content/' . $maybe_slug . '.php';
    if ($maybe_slug && file_exists($content_file)) {
        $article_url = rtrim($canonical_base_url, '/') . '/' . $maybe_slug;
        $published = date('c', file_exists($content_file) ? filemtime($content_file) : time());
        ?>
        <script type="application/ld+json">
        <?php echo json_encode([
            "@context" => "https://schema.org",
            "@type" => "Article",
            "headline" => isset($page_title) ? $page_title : ucwords(str_replace('-', ' ', $maybe_slug)),
            "description" => isset($page_description) ? $page_description : '',
            "mainEntityOfPage" => ["@type" => "WebPage", "@id" => $article_url],
            "url" => $article_url,
            "datePublished" => $published,
            "author" => ["@type" => "Organization", "name" => "{$site_name}" ]
        ]); ?>
        </script>
        <?php
    }
    ?>

    <!-- Essential Libraries (deferred to improve initial render) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js" defer></script>

</head>

<body class="app-shell">
    <a href="#primary" class="visually-hidden-focusable" id="skip-to-content">Skip to content</a>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2923840482782912"
        crossorigin="anonymous"></script>

    <aside class="app-sidebar" id="app-sidebar" aria-label="Primary navigation">
        <a class="app-sidebar-brand" href="<?php echo $base_url; ?>">
            <img class="app-brand-logo" src="<?php echo $base_url; ?>assets/img/wordscompare-mark.svg" alt="">
            <span>
                <strong class="wc-wordmark"><span>Words</span><span class="wc-wordmark-compare">Compare</span></strong>
                <small>Compare. Calculate. Create.</small>
            </span>
        </a>
        <div class="app-sidebar-label">Categories</div>
        <nav class="app-sidebar-nav">
            <a href="<?php echo $base_url; ?>qa-tools" class="app-sidebar-link is-active"><i class="fas fa-vial"></i><span>QA Tools</span><i class="fas fa-chevron-right"></i></a>
            <a href="<?php echo $base_url; ?>developer-tools" class="app-sidebar-link"><i class="fas fa-code"></i><span>Developer Tools</span><i class="fas fa-chevron-right"></i></a>
            <a href="<?php echo $base_url; ?>text-tools" class="app-sidebar-link"><i class="fas fa-font"></i><span>Text Tools</span><i class="fas fa-chevron-right"></i></a>
            <a href="<?php echo $base_url; ?>pdf-tools" class="app-sidebar-link"><i class="fas fa-file-pdf"></i><span>PDF Tools</span><i class="fas fa-chevron-right"></i></a>
            <a href="<?php echo $base_url; ?>calculators" class="app-sidebar-link"><i class="fas fa-calculator"></i><span>Calculators</span><i class="fas fa-chevron-right"></i></a>
            <a href="<?php echo $base_url; ?>converters" class="app-sidebar-link"><i class="fas fa-globe"></i><span>Converters</span><i class="fas fa-chevron-right"></i></a>
        </nav>
        <div class="app-sidebar-label app-sidebar-label-spaced">Quick Access</div>
        <nav class="app-sidebar-nav app-sidebar-quick-links">
            <a href="<?php echo $base_url; ?>developer-tools" class="app-sidebar-link"><i class="fas fa-fire"></i><span>Popular Tools</span></a>
            <a href="#tool-collections-dialog" class="app-sidebar-link" data-wc-collection-open="favorites" aria-haspopup="dialog"><i class="fas fa-heart"></i><span>Favorites</span></a>
            <a href="#tool-collections-dialog" class="app-sidebar-link" data-wc-collection-open="recent" aria-haspopup="dialog"><i class="fas fa-clock"></i><span>Recent Tools</span></a>
            <a href="#tool-collections-dialog" class="app-sidebar-link" data-wc-collection-open="my-tools" aria-haspopup="dialog"><i class="fas fa-list"></i><span>My Tools List</span></a>
        </nav>
    </aside>

    <dialog class="tool-collection-dialog" id="tool-collections-dialog" aria-labelledby="tool-collection-title">
        <div class="tool-collection-panel">
            <header class="tool-collection-header">
                <div>
                    <p class="tool-collection-eyebrow">YOUR WORKSPACE</p>
                    <h2 id="tool-collection-title" data-tool-collection-title>Favorites</h2>
                </div>
                <button type="button" class="tool-collection-close" data-tool-collection-close aria-label="Close lists">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </header>
            <nav class="tool-collection-tabs" role="tablist" aria-label="Tool lists">
                <button type="button" role="tab" aria-selected="true" aria-controls="tool-collection-items" data-tool-collection-tab="favorites">Favorites</button>
                <button type="button" role="tab" aria-selected="false" aria-controls="tool-collection-items" data-tool-collection-tab="recent">Recent</button>
                <button type="button" role="tab" aria-selected="false" aria-controls="tool-collection-items" data-tool-collection-tab="my-tools">My Tools</button>
            </nav>
            <div class="tool-collection-current" data-tool-current-actions hidden>
                <span data-tool-current-name></span>
                <div class="tool-collection-current-actions">
                    <button type="button" data-tool-current-toggle="favorites">Add to Favorites</button>
                    <button type="button" data-tool-current-toggle="my-tools">Add to My Tools</button>
                </div>
            </div>
            <button type="button" class="tool-collection-clear" data-tool-collection-clear hidden>Clear recent tools</button>
            <div class="tool-collection-items" id="tool-collection-items" data-tool-collection-items role="tabpanel" aria-live="polite"></div>
        </div>
    </dialog>

    <nav class="navbar navbar-expand-lg sticky-top app-topbar">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <a class="navbar-brand" href="<?php echo $base_url; ?>">
                    <img class="wc-brand-logo" src="<?php echo $base_url; ?>assets/img/wordscompare-mark.svg" alt="">
                    <span class="wc-wordmark"><span>Words</span><span class="wc-wordmark-compare">Compare</span></span>
                </a>
                <div class="app-nav-controls" aria-label="Page controls">
                    <button class="app-sidebar-toggle" type="button" id="app-sidebar-toggle" aria-controls="app-sidebar" aria-expanded="true" aria-label="Collapse sidebar" title="Collapse sidebar">
                        <i class="fas fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <button class="nav-link app-back-button" type="button" id="app-back-button" data-home-url="<?php echo htmlspecialchars($base_url, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Go back" title="Go back">
                        <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    </button>
                </div>
                <a class="nav-link me-2" href="<?php echo $base_url; ?>">
                    <i class="fas fa-home"></i> Home
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>about">
                            <i class="fas fa-info-circle me-1"></i>About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>privacy">
                            <i class="fas fa-user-shield me-1"></i>Privacy
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url; ?>contact">
                            <i class="fas fa-envelope me-1"></i>Contact
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-wc-search aria-label="Search (Ctrl/Cmd+K)" aria-expanded="false" title="Search">
                            <i class="fas fa-search me-1" aria-hidden="true"></i>Search
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link app-theme-toggle" type="button" id="theme-toggle" aria-label="Switch to dark theme" title="Switch to dark theme" aria-pressed="false">
                            <i class="fas fa-moon" aria-hidden="true"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Search UI loader: load search widget on-demand to reduce initial JS payload -->
    <script>window.BASE_URL = '<?php echo $base_url; ?>';
    (function(){
        var loaded=false;
        var pendingTrigger=null;
        var searchDebug=new URLSearchParams(window.location.search).get('debugSearch')==='1';
        function logSearch(event, details){ if(searchDebug && window.console) console.debug('[WCSearch]', event, details || {}); }
        function loadSearch(trigger){
            if(trigger) pendingTrigger=trigger;
            logSearch('load request', { loaded: loaded, trigger: trigger && (trigger.id || trigger.getAttribute('aria-label')), expanded: trigger && trigger.getAttribute('aria-expanded') });
            if(loaded){
                if(window.WCSearch){
                    logSearch('reuse loaded widget', { containerHidden: document.getElementById('wc-search-container')?.hidden });
                    window.WCSearch.open(trigger);
                } else {
                    logSearch('widget marked loaded but API missing');
                }
                return;
            }
            loaded=true;
            var s=document.createElement('script');
            s.src=window.BASE_URL + 'assets/js/search.js?v=<?php echo filemtime(__DIR__ . '/../assets/js/search.js'); ?>';
            s.defer=true;
            s.onload=function(){ try{ if(window.WCSearch && window.WCSearch.input) {
                        logSearch('widget script loaded', { trigger: pendingTrigger && (pendingTrigger.id || pendingTrigger.getAttribute('aria-label')) });
                        // Transfer value from any delegated trigger input with data-wc-search-value
                        try{
                            var trigger = document.querySelector('[data-wc-search-value]');
                            if (trigger && trigger.value) {
                                window.WCSearch.input.value = trigger.value;
                                var ev = new Event('input', { bubbles: true });
                                window.WCSearch.input.dispatchEvent(ev);
                            }
                        }catch(e){}
                        window.WCSearch.open(pendingTrigger);
                        pendingTrigger=null;
                    } else { logSearch('widget script loaded without API'); } }catch(e){ logSearch('widget initialization error', { message: e.message }); } };
            s.onerror=function(){ loaded=false; logSearch('widget script failed to load', { src: s.src }); };
            document.body.appendChild(s);
        }
        // Ctrl/Cmd+K hotkey to load
        window.addEventListener('keydown', function(e){ if((e.ctrlKey||e.metaKey) && e.key.toLowerCase()==='k'){ e.preventDefault(); logSearch('keyboard shortcut'); loadSearch(); } });
        // also load when clicking a future search icon (delegated)
        document.addEventListener('click', function(e){ var t=e.target; var trigger=t && (t.matches && t.matches('[data-wc-search]') ? t : (t.closest && t.closest('[data-wc-search]'))); if(trigger){ e.preventDefault(); logSearch('search trigger clicked', { id: trigger.id, expanded: trigger.getAttribute('aria-expanded') }); loadSearch(trigger); } });
    })();
    </script>
        <script>
        // Ensure first <main> receives an id for skip-link targets
        (function(){
            document.addEventListener('DOMContentLoaded', function(){
                try{
                    var m = document.querySelector('main');
                    if(m && !m.id) m.id = 'primary';
                }catch(e){}
            });
        })();
        </script>
        <script>
        // Mark icon elements as decorative for screen readers by default
        document.addEventListener('DOMContentLoaded', function(){
            try{
                document.querySelectorAll('i[class^="fa"]').forEach(function(ic){ ic.setAttribute('aria-hidden','true'); });
            }catch(e){}
        });
        </script>

    <?php
    // If the current request maps to a tool in views/tools, include a small SEO panel and breadcrumbs.
    $request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $slug = trim($request_path, '/');
    $tool_file = __DIR__ . '/../views/tools/' . $slug . '.php';
    if ($slug && file_exists($tool_file)) {
        include_once __DIR__ . '/tool-seo.php';
    }
    // If request maps to a content guide, show breadcrumb + related tools
    $maybe_slug = $slug;
    $content_file = __DIR__ . '/../views/content/' . $maybe_slug . '.php';
    if ($maybe_slug && file_exists($content_file)) {
        // breadcrumb for guides
        $guide_title = ucwords(str_replace(['-','_'], ' ', preg_replace('/-content$/','',$maybe_slug)));
        echo '<div class="container mt-3">';
        echo '<nav aria-label="Breadcrumb" class="mb-3"><ol class="breadcrumb mb-0">';
        echo '<li class="breadcrumb-item"><a href="' . $base_url . '" class="text-decoration-none">Home</a></li>';
        echo '<li class="breadcrumb-item"><a href="' . $base_url . '" class="text-decoration-none">Guides</a></li>';
        echo '<li class="breadcrumb-item active" aria-current="page">' . htmlspecialchars($guide_title) . '</li>';
        echo '</ol></nav></div>';
        include_once __DIR__ . '/content-tools.php';
    }
    ?>
