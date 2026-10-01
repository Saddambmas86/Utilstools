<?php
include_once __DIR__ . '/category-data.php';

if (!isset($category_key) || !isset($wordscompare_categories[$category_key])) {
    http_response_code(404);
    echo '<p>Category not found.</p>';
    return;
}

$category = $wordscompare_categories[$category_key];

/**
 * Get Font Awesome icon class for a tool slug.
 */
function getToolIcon(string $slug): string {
    $map = [
        'json-formatter' => 'fa-code',
        'json-viewer' => 'fa-eye',
        'json-to-pdf' => 'fa-file-pdf',
        'pdf-to-json' => 'fa-file-code',
        'base64-encoder' => 'fa-lock',
        'url-encoder' => 'fa-link',
        'jwt-decoder' => 'fa-key',
        'hash-generator' => 'fa-fingerprint',
        'password-generator' => 'fa-user-shield',
        'color-picker' => 'fa-palette',
        'qr-code-generator' => 'fa-qrcode',
        'html-to-pdf' => 'fa-file-export',
        'pdf-to-html' => 'fa-file-import',
        'case-converter' => 'fa-font',
        'text-to-slug' => 'fa-link',
        'text-comparison' => 'fa-columns',
        'find-replace-text' => 'fa-search',
        'remove-extra-spaces' => 'fa-eraser',
        'word-counter' => 'fa-calculator',
        'reverse-text' => 'fa-exchange-alt',
        'age-calculator' => 'fa-birthday-cake',
        'unit-converter' => 'fa-ruler',
        'simple-calculator' => 'fa-calculator',
        'emi-calculator' => 'fa-money-bill',
        'gst-calculator' => 'fa-percent',
        'cagr-calculator' => 'fa-chart-line',
        'discount-calculator' => 'fa-tags',
        'compound-interest-calculator' => 'fa-chart-area',
        'ppf-calculator' => 'fa-piggy-bank',
        'sip-calculator' => 'fa-hand-holding-usd',
        'retirement-calculator' => 'fa-umbrella-beach',
        'bmi-calculator' => 'fa-weight',
        'add-page-number-to-pdf' => 'fa-file-alt',
        'add-watermark-to-pdf' => 'fa-stamp',
        'delete-pdf-pages' => 'fa-trash-alt',
        'reorder-pdf-pages' => 'fa-sort',
        'compress-pdf' => 'fa-file-archive',
        'merge-pdf' => 'fa-object-group',
        'split-pdf' => 'fa-object-ungroup',
        'flatten-pdf' => 'fa-layer-group',
        'pdf-to-word' => 'fa-file-word',
        'pdf-to-excel' => 'fa-file-excel',
    ];

    if (isset($map[$slug])) {
        return $map[$slug];
    }

    if (str_contains($slug, 'calculator') || str_contains($slug, 'interest') || str_contains($slug, 'loan')) {
        return 'fa-calculator';
    }
    if (str_contains($slug, 'pdf')) {
        return str_contains($slug, 'to-') ? 'fa-file-export' : 'fa-file-pdf';
    }
    if (str_contains($slug, 'image') || preg_match('/^(jpg|jpeg|png|svg|webp|jfif)-to-/', $slug)) {
        return 'fa-image';
    }
    if (str_contains($slug, 'text') || str_contains($slug, 'word')) {
        return 'fa-font';
    }
    if (str_contains($slug, 'json') || str_contains($slug, 'xml') || str_contains($slug, 'csv')) {
        return 'fa-code';
    }
    if (str_contains($slug, 'password') || str_contains($slug, 'lock') || str_contains($slug, 'security')) {
        return 'fa-shield-halved';
    }

    return 'fa-toolbox';
}

?>
<main class="container py-4 py-md-5">
    <nav aria-label="Breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($category['title']); ?></li>
        </ol>
    </nav>
    <script type="application/ld+json">
    <?php echo json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => rtrim($canonical_base_url, '/'),
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $category['title'],
                'item' => rtrim($canonical_base_url, '/') . '/' . $category['slug'],
            ],
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>
    </script>

    <header class="mb-5">
        <h1 class="display-5 fw-bold mb-3"><?php echo htmlspecialchars($category['title']); ?></h1>
        <p class="lead mb-0"><?php echo htmlspecialchars($category['intro']); ?></p>

        <?php if ($category_key === 'qa-tools'): ?>
            <div class="mt-4 d-flex flex-wrap gap-2">
                <span class="badge bg-danger-subtle text-danger rounded-pill px-3 py-2">QA engineers</span>
                <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">Software testers</span>
                <span class="badge bg-info-subtle text-info rounded-pill px-3 py-2">Automation testers</span>
                <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">API testers</span>
                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2">SDET engineers</span>
            </div>
        <?php endif; ?>

        <?php if ($category_key === 'developer-tools'): ?>
            <div class="mt-4 d-flex flex-wrap gap-2">
                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">Software developers</span>
                <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">Backend developers</span>
                <span class="badge bg-info-subtle text-info rounded-pill px-3 py-2">Frontend developers</span>
                <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">Full-stack engineers</span>
            </div>
        <?php endif; ?>

        <?php if ($category_key === 'api-testing-tools'): ?>
            <div class="mt-4 d-flex flex-wrap gap-2">
                <span class="badge bg-info-subtle text-info rounded-pill px-3 py-2">QA engineers</span>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">API testers</span>
                <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">Backend developers</span>
                <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3 py-2">SDET</span>
                <span class="badge bg-warning-subtle text-warning rounded-pill px-3 py-2">Automation engineers</span>
            </div>
        <?php endif; ?>
    </header>

    <?php if ($category_key === 'developer-tools'): ?>
        <section class="mb-5" aria-labelledby="why-developers-use-wordscompare">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-4">
                    <h2 id="why-developers-use-wordscompare" class="h4 mb-3">Why developers use WordsCompare</h2>
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <h3 class="h6 mb-2">Inspect data fast</h3>
                                <p class="small text-muted mb-0">Format JSON, view payloads, and diagnose API responses without leaving the browser.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <h3 class="h6 mb-2">Check security flows</h3>
                                <p class="small text-muted mb-0">Decode JWTs, verify hash output, and review encoded values during auth and integration work.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <h3 class="h6 mb-2">Keep delivery moving</h3>
                                <p class="small text-muted mb-0">Use quick tools for date conversion, text cleanup, and formatting checks while shipping code.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <h3 class="h6 mb-2">Ship cleaner output</h3>
                                <p class="small text-muted mb-0">Validate syntax, compare versions, and prepare content or payloads before deployment.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($category_key === 'api-testing-tools'): ?>
        <section class="mb-5" aria-labelledby="api-response-workflow">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-4">
                    <h2 id="api-response-workflow" class="h4 mb-3">API Response Workflow</h2>
                    <p class="small text-muted">A concise sequence to inspect API responses and related artifacts. Open each step to run the tool on live payloads.</p>
                    <div class="row g-3 mt-3">
                        <div class="col-lg-12">
                            <ol class="mb-0 ps-3">
                                <li class="mb-2"><a href="<?php echo $base_url; ?>json-formatter">Format JSON</a> — prettify and validate response payloads.</li>
                                <li class="mb-2"><a href="<?php echo $base_url; ?>json-formatter">Validate JSON</a> — check for syntax errors and common pitfalls.</li>
                                <li class="mb-2"><a href="<?php echo $base_url; ?>text-comparison">Compare JSON responses</a> — detect regressions between builds or environments.</li>
                                <li class="mb-2"><a href="<?php echo $base_url; ?>jwt-decoder">Decode JWT</a> — inspect token claims, scopes, and expiry.</li>
                                <li class="mb-2"><a href="<?php echo $base_url; ?>base64-encoder">Decode Base64</a> — reveal encoded response sections for inspection.</li>
                                <li class="mb-2"><a href="<?php echo $base_url; ?>url-encoder">Encode URL parameters</a> — ensure safe parameter transmission in HTTP requests.</li>
                                <li class="mb-2"><a href="<?php echo $base_url; ?>text-comparison">Check HTTP response bodies</a> — compare headers or captured output from traces.</li>
                                <li class="mb-2"><a href="<?php echo $base_url; ?>case-converter">Generate consistent test keys</a> — normalize identifiers for assertions.</li>
                                <li class="mb-2"><a href="<?php echo $base_url; ?>age-calculator">Convert timestamps</a> — switch between Unix epoch and readable dates.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ($category_key === 'qa-tools'): ?>
        <section class="mb-5" aria-labelledby="popular-qa-workflows">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-4">
                    <h2 id="popular-qa-workflows" class="h4 mb-3">Popular QA workflows</h2>
                    <div class="row g-3">
                        <div class="col-lg-4">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <h3 class="h6 mb-2">API Testing</h3>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="<?php echo $base_url; ?>json-formatter" class="btn btn-sm btn-outline-primary rounded-pill">JSON Formatter</a>
                                    <a href="<?php echo $base_url; ?>json-viewer" class="btn btn-sm btn-outline-primary rounded-pill">JSON Viewer</a>
                                    <a href="<?php echo $base_url; ?>text-comparison" class="btn btn-sm btn-outline-primary rounded-pill">Text Compare</a>
                                    <a href="<?php echo $base_url; ?>jwt-decoder" class="btn btn-sm btn-outline-primary rounded-pill">JWT Decoder</a>
                                    <a href="<?php echo $base_url; ?>base64-encoder" class="btn btn-sm btn-outline-primary rounded-pill">Base64</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <h3 class="h6 mb-2">Automation</h3>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="<?php echo $base_url; ?>find-replace-text" class="btn btn-sm btn-outline-warning rounded-pill">Find &amp; Replace</a>
                                    <a href="<?php echo $base_url; ?>case-converter" class="btn btn-sm btn-outline-warning rounded-pill">Case Converter</a>
                                    <a href="<?php echo $base_url; ?>reverse-text" class="btn btn-sm btn-outline-warning rounded-pill">Reverse Text</a>
                                    <a href="<?php echo $base_url; ?>text-comparison" class="btn btn-sm btn-outline-warning rounded-pill">Text Compare</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="border rounded-4 p-3 h-100 bg-light-subtle">
                                <h3 class="h6 mb-2">Comparison</h3>
                                <div class="d-flex flex-wrap gap-2">
                                    <a href="<?php echo $base_url; ?>text-comparison" class="btn btn-sm btn-outline-success rounded-pill">Text Compare</a>
                                    <a href="<?php echo $base_url; ?>json-viewer" class="btn btn-sm btn-outline-success rounded-pill">JSON Viewer</a>
                                    <a href="<?php echo $base_url; ?>case-converter" class="btn btn-sm btn-outline-success rounded-pill">Case Converter</a>
                                    <a href="<?php echo $base_url; ?>find-replace-text" class="btn btn-sm btn-outline-success rounded-pill">Find &amp; Replace</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php foreach ($category['groups'] as $group): ?>
        <section class="mb-5" aria-labelledby="group-<?php echo md5($group['title']); ?>">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h2 id="group-<?php echo md5($group['title']); ?>" class="h4 mb-0 fw-semibold"><?php echo htmlspecialchars($group['title']); ?></h2>
                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                            <?php echo count($group['tools']); ?> <?php echo count($group['tools']) === 1 ? 'tool' : 'tools'; ?>
                        </span>
                    </div>
                    <div class="row g-3 g-md-4">
                        <?php foreach ($group['tools'] as $tool): ?>
                            <div class="col-12 col-sm-6 col-xl-4">
                                <a href="<?php echo $base_url . $tool['slug']; ?>" class="tool-card-link text-decoration-none text-body d-block h-100">
                                    <div class="tool-card category-tool-card category-accent-<?php echo htmlspecialchars($category_key, ENT_QUOTES, 'UTF-8'); ?> h-100 position-relative">
                                        <div class="card-hover-effects"></div>
                                        <div class="category-tool-layout position-relative z-index-1">
                                            <div class="category-tool-icon icon-wrapper flex-shrink-0">
                                                <i class="fas <?php echo getToolIcon($tool['slug']); ?>" aria-hidden="true"></i>
                                            </div>
                                            <div class="category-tool-copy">
                                                <h3 class="mb-1 fw-semibold"><?php echo htmlspecialchars($tool['title']); ?></h3>
                                                <p class="small text-muted mb-0"><?php echo htmlspecialchars($tool['description']); ?></p>
                                            </div>
                                            <span class="category-tool-arrow" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <?php if (!empty($category['related'])): ?>
        <section class="mt-5">
            <h2 class="h4 mb-3">Related categories</h2>
            <div class="d-flex flex-wrap gap-2">
                <?php foreach ($category['related'] as $related_key): ?>
                    <?php $related = $wordscompare_categories[$related_key]; ?>
                    <a href="<?php echo $base_url . $related['slug']; ?>" class="btn btn-outline-secondary rounded-pill"><?php echo htmlspecialchars($related['title']); ?></a>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</main>
