<?php

$page_title = ""; // Edit in '/includes/config.php'
$page_description = "WordsCompare offers free online tools like PDF convertor, text utilities, calculators, and more — fast, secure, no signup";
$page_keywords = "Words Compare, PDF to XML, Speech to PDF, content tools, free web utilities";
include 'includes/header.php';

?>


<!-- AdSense Test Ad: Responsive (test mode) -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2923840482782912"
    crossorigin="anonymous"></script>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZVG71163ZG"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-ZVG71163ZG');
</script>

<main class="container-fluid my-1 px-0 home-page-shell">
    <?php
    $categoryCards = [
        ['title' => 'Developer', 'description' => 'JSON, Encoding, JWT, Code, URLs and more', 'url' => $base_url . 'developer-tools', 'icon' => 'fa-code', 'accent' => 'developer'],
        ['title' => 'QA & Testing', 'description' => 'JSON Diff, Validation, Test Data, Regex and more', 'url' => $base_url . 'qa-tools', 'icon' => 'fa-vial', 'accent' => 'qa'],
        ['title' => 'API Testing', 'description' => 'API Tools, Responses, Headers, Auth and more', 'url' => $base_url . 'api-testing-tools', 'icon' => 'fa-plug', 'accent' => 'api'],
        ['title' => 'DevOps', 'description' => 'YAML, Cron, Environment, Conversion and more', 'url' => $base_url . 'devops-tools', 'icon' => 'fa-server', 'accent' => 'devops'],
        ['title' => 'PDF Tools', 'description' => 'Convert, Merge, Split, Compress, OCR and more', 'url' => $base_url . 'pdf-tools', 'icon' => 'fa-file-pdf', 'accent' => 'pdf'],
        ['title' => 'Text Tools', 'description' => 'Compare, Count, Clean, Transform and more', 'url' => $base_url . 'text-tools', 'icon' => 'fa-file-alt', 'accent' => 'text'],
        ['title' => 'Calculators', 'description' => 'Finance, Math, Date, Percentage and more', 'url' => $base_url . 'calculators', 'icon' => 'fa-calculator', 'accent' => 'calc'],
        ['title' => 'Web Tools', 'description' => 'SEO, Domains, URLs, Converters and more', 'url' => $base_url . 'developer-tools', 'icon' => 'fa-globe', 'accent' => 'web'],
        ['title' => 'Security', 'description' => 'Hash, Token, Encode, Decode and more', 'url' => $base_url . 'developer-tools', 'icon' => 'fa-shield-alt', 'accent' => 'security'],
    ];

    $developerTools = [
        ['title' => 'JSON Formatter', 'description' => 'Format and validate JSON payloads.', 'url' => $base_url . 'json-formatter', 'icon' => 'fa-code'],
        ['title' => 'JSON Viewer', 'description' => 'Browse structured JSON content clearly.', 'url' => $base_url . 'json-viewer', 'icon' => 'fa-eye'],
        ['title' => 'Base64 Encoder', 'description' => 'Encode and decode Base64 values.', 'url' => $base_url . 'base64-encoder', 'icon' => 'fa-lock'],
        ['title' => 'URL Encoder', 'description' => 'Encode and decode URL-safe strings.', 'url' => $base_url . 'url-encoder', 'icon' => 'fa-link'],
        ['title' => 'Hash Generator', 'description' => 'Create MD5, SHA and other hashes.', 'url' => $base_url . 'hash-generator', 'icon' => 'fa-fingerprint'],
        ['title' => 'JWT Decoder', 'description' => 'Inspect JWT headers and payloads.', 'url' => $base_url . 'jwt-decoder', 'icon' => 'fa-key'],
    ];

    $qaTools = [
        ['title' => 'Text Compare', 'description' => 'Compare text blocks and spot differences.', 'url' => $base_url . 'text-comparison', 'icon' => 'fa-code-branch'],
        ['title' => 'Word Counter', 'description' => 'Check word and character counts quickly.', 'url' => $base_url . 'word-counter', 'icon' => 'fa-font'],
        ['title' => 'Find & Replace Text', 'description' => 'Find and replace repeated text values.', 'url' => $base_url . 'find-replace-text', 'icon' => 'fa-search'],
        ['title' => 'Case Converter', 'description' => 'Convert text to sentence, title, and lower case.', 'url' => $base_url . 'case-converter', 'icon' => 'fa-text-height'],
        ['title' => 'JSON Viewer', 'description' => 'Inspect JSON output and response payloads.', 'url' => $base_url . 'json-viewer', 'icon' => 'fa-eye'],
        ['title' => 'Remove Extra Spaces', 'description' => 'Clean up formatting and white space issues.', 'url' => $base_url . 'remove-extra-spaces', 'icon' => 'fa-eraser'],
    ];

    $apiTools = [
        ['title' => 'JSON Formatter', 'description' => 'Format API JSON responses clearly.', 'url' => $base_url . 'json-formatter', 'icon' => 'fa-code'],
        ['title' => 'JSON Viewer', 'description' => 'Inspect structured API payloads.', 'url' => $base_url . 'json-viewer', 'icon' => 'fa-eye'],
        ['title' => 'JWT Decoder', 'description' => 'Decode and validate JWT tokens.', 'url' => $base_url . 'jwt-decoder', 'icon' => 'fa-key'],
        ['title' => 'Base64 Encoder', 'description' => 'Encode Base64 payloads in the browser.', 'url' => $base_url . 'base64-encoder', 'icon' => 'fa-lock'],
        ['title' => 'URL Encoder', 'description' => 'Prepare request values for APIs and URLs.', 'url' => $base_url . 'url-encoder', 'icon' => 'fa-link'],
        ['title' => 'Hash Generator', 'description' => 'Generate hash values for verification.', 'url' => $base_url . 'hash-generator', 'icon' => 'fa-fingerprint'],
    ];

    $devopsTools = [
        ['title' => 'Hash Generator', 'description' => 'Create hashes for integrity checks.', 'url' => $base_url . 'hash-generator', 'icon' => 'fa-fingerprint'],
        ['title' => 'Base64 Encoder', 'description' => 'Work with values used in configs and services.', 'url' => $base_url . 'base64-encoder', 'icon' => 'fa-lock'],
        ['title' => 'URL Encoder', 'description' => 'Handle encoded URL query values safely.', 'url' => $base_url . 'url-encoder', 'icon' => 'fa-link'],
        ['title' => 'JSON Formatter', 'description' => 'Normalize JSON for deployment payloads.', 'url' => $base_url . 'json-formatter', 'icon' => 'fa-code'],
        ['title' => 'JSON Viewer', 'description' => 'Read payloads and objects in structured form.', 'url' => $base_url . 'json-viewer', 'icon' => 'fa-eye'],
        ['title' => 'JWT Decoder', 'description' => 'Inspect auth tokens used in services.', 'url' => $base_url . 'jwt-decoder', 'icon' => 'fa-key'],
    ];

    $textTools = [
        ['title' => 'Case Converter', 'description' => 'Change casing for clean text output.', 'url' => $base_url . 'case-converter', 'icon' => 'fa-text-height'],
        ['title' => 'Remove Extra Spaces', 'description' => 'Clean white space and formatting noise.', 'url' => $base_url . 'remove-extra-spaces', 'icon' => 'fa-eraser'],
        ['title' => 'Text Compare', 'description' => 'Compare content and review changes.', 'url' => $base_url . 'text-comparison', 'icon' => 'fa-code-branch'],
        ['title' => 'Word Counter', 'description' => 'Review counts and text stats instantly.', 'url' => $base_url . 'word-counter', 'icon' => 'fa-font'],
        ['title' => 'Find & Replace Text', 'description' => 'Update repeated values across content.', 'url' => $base_url . 'find-replace-text', 'icon' => 'fa-search'],
        ['title' => 'Text to Slug', 'description' => 'Convert names into URL-friendly slugs.', 'url' => $base_url . 'text-to-slug', 'icon' => 'fa-link'],
    ];

    $pdfTools = [
        ['title' => 'Compress PDF', 'description' => 'Reduce PDF size quickly.', 'url' => $base_url . 'compress-pdf', 'icon' => 'fa-file-pdf'],
        ['title' => 'Merge PDF', 'description' => 'Combine multiple PDFs into one.', 'url' => $base_url . 'merge-pdf', 'icon' => 'fa-object-group'],
        ['title' => 'Split PDF', 'description' => 'Separate a PDF into smaller files.', 'url' => $base_url . 'split-pdf', 'icon' => 'fa-scissors'],
        ['title' => 'Add Watermark to PDF', 'description' => 'Apply a watermark to your document.', 'url' => $base_url . 'add-watermark-to-pdf', 'icon' => 'fa-water'],
        ['title' => 'PDF to Word', 'description' => 'Convert PDF files to Word format.', 'url' => $base_url . 'pdf-to-word', 'icon' => 'fa-file-word'],
        ['title' => 'PDF to JSON', 'description' => 'Extract structured content from PDF to JSON.', 'url' => $base_url . 'pdf-to-json', 'icon' => 'fa-file-code'],
    ];

    $calculatorTools = [
        ['title' => 'EMI Calculator', 'description' => 'Estimate monthly loan repayments.', 'url' => $base_url . 'emi-calculator', 'icon' => 'fa-calculator'],
        ['title' => 'GST Calculator', 'description' => 'Calculate GST on product values.', 'url' => $base_url . 'gst-calculator', 'icon' => 'fa-receipt'],
        ['title' => 'Compound Interest', 'description' => 'Model investment growth with compounding.', 'url' => $base_url . 'compound-interest-calculator', 'icon' => 'fa-chart-line'],
        ['title' => 'BMI Calculator', 'description' => 'Check body mass index quickly.', 'url' => $base_url . 'bmi-calculator', 'icon' => 'fa-heartbeat'],
        ['title' => 'Age Calculator', 'description' => 'Calculate age from date of birth.', 'url' => $base_url . 'age-calculator', 'icon' => 'fa-user-clock'],
        ['title' => 'Unit Converter', 'description' => 'Convert units for everyday work.', 'url' => $base_url . 'unit-converter', 'icon' => 'fa-arrows-alt'],
    ];

    $guideCards = [
        ['title' => 'Developer tools', 'description' => 'Format, encode and validate data in your browser.', 'url' => $base_url . 'developer-tools'],
        ['title' => 'QA & Testing tools', 'description' => 'Compare content, inspect output and review changes.', 'url' => $base_url . 'qa-tools'],
        ['title' => 'PDF tools', 'description' => 'Edit, compress and convert PDFs without installing software.', 'url' => $base_url . 'pdf-tools'],
    ];
    ?>

    <section class="hero-section app-hero-section">
        <div class="container hero-shell">
            <div class="row align-items-center g-4 g-lg-5">
                <div class="col-lg-6">
                    <div class="hero-copy">
                        <span class="hero-badge">100+ Free Tools</span>
                        <h1 class="hero-title">Developer &amp; QA tools<br>made <span class="gradient-text">simple.</span></h1>
                        <p class="hero-subtitle">Format, compare, validate, convert and generate data instantly in your browser. No signup. No limits.</p>

                        <div class="hero-search-wrap">
                            <button id="global-search-trigger" class="hero-search-btn" type="button" data-wc-search aria-label="Open search (Ctrl/Cmd+K)" aria-expanded="false">
                                <span class="hero-search-icon"><i class="fas fa-search" aria-hidden="true"></i></span>
                                <span class="hero-search-label">Search 100+ tools...</span>
                                <span class="hero-search-shortcut">⌘ K</span>
                            </button>
                        </div>

                        <div class="hero-tags-wrap">
                            <span class="hero-tags-label">Popular searches:</span>
                            <div class="hero-tags">
                                <a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a>
                                <a href="<?php echo $base_url; ?>text-comparison">JSON Diff</a>
                                <a href="<?php echo $base_url; ?>jwt-decoder">JWT Decoder</a>
                                <a href="<?php echo $base_url; ?>base64-encoder">Base64</a>
                                <a href="<?php echo $base_url; ?>url-encoder">URL Encoder</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-visual d-none d-lg-block" aria-hidden="true">
                        <div class="hero-visual-panel hero-panel-main">
                            <div class="hero-panel-header">
                                <span class="dot dot-purple"></span>
                                <span class="dot dot-cyan"></span>
                                <span class="dot dot-green"></span>
                            </div>

                            <div class="hero-console">
                                <div class="hero-console-line line-lg"></div>
                                <div class="hero-console-line"></div>
                                <div class="hero-console-line"></div>
                                <div class="hero-console-line line-mid"></div>
                                <div class="hero-console-line line-sm"></div>
                            </div>

                            <div class="hero-floating-card hero-card-json">
                                <span class="hero-card-label">JSON</span>
                                <div class="hero-json-row"><span></span><span></span><span></span></div>
                                <div class="hero-json-row small"><span></span><span></span></div>
                                <div class="hero-json-row small"><span></span><span></span><span></span></div>
                            </div>

                            <div class="hero-floating-card hero-card-search">
                                <span class="hero-card-label">Search</span>
                                <div class="hero-search-mini">
                                    <i class="fas fa-search"></i>
                                    <span>json formatter</span>
                                </div>
                            </div>

                            <div class="hero-floating-card hero-card-qa">
                                <span class="hero-card-label">QA</span>
                                <div class="hero-qa-bars">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="trust-strip">
        <div class="container">
            <div class="trust-grid">
                <div class="trust-item">
                    <div class="trust-icon"><i class="fas fa-circle-dollar-to-slot" aria-hidden="true"></i></div>
                    <div>
                        <h3>Free to use</h3>
                        <p>100% free to use</p>
                    </div>
                </div>
                <div class="trust-item">
                    <div class="trust-icon"><i class="fas fa-user-check" aria-hidden="true"></i></div>
                    <div>
                        <h3>No signup</h3>
                        <p>Start using instantly</p>
                    </div>
                </div>
                <div class="trust-item">
                    <div class="trust-icon"><i class="fas fa-window-maximize" aria-hidden="true"></i></div>
                    <div>
                        <h3>Browser-based</h3>
                        <p>Works directly in your browser where supported</p>
                    </div>
                </div>
                <div class="trust-item">
                    <div class="trust-icon"><i class="fas fa-shield-heart" aria-hidden="true"></i></div>
                    <div>
                        <h3>Privacy focused</h3>
                        <p>Your data stays private where local processing is supported</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="working-section py-3 py-md-4 py-lg-5">
        <div class="container">
            <div class="working-header mb-4">
                <h2>What are you working on?</h2>
            </div>

            <div class="working-grid">
                <?php foreach ($categoryCards as $category): ?>
                    <a href="<?php echo $category['url']; ?>" class="working-card card-accent-<?php echo $category['accent']; ?>">
                        <div class="working-card-icon">
                            <i class="fas <?php echo $category['icon']; ?>" aria-hidden="true"></i>
                        </div>

                        <div class="working-card-content">
                            <h3><?php echo htmlspecialchars($category['title']); ?></h3>
                            <p><?php echo htmlspecialchars($category['description']); ?></p>
                        </div>

                        <div class="working-card-arrow" aria-hidden="true">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="developer-tools" class="developer-home-section py-5">
        <div class="container">
            <div class="developer-home-shell">
                <div class="developer-home-copy">
                    <p class="eyebrow mb-2">Built for Developers</p>
                    <h2>Built for Developers</h2>
                    <p>Fast browser-based utilities for JSON, encoding, APIs, security, web development and everyday engineering tasks.</p>
                    <a href="<?php echo $base_url; ?>developer-tools" class="developer-home-link">View Developer Tools <span aria-hidden="true">→</span></a>
                </div>

                <div class="developer-home-panel" aria-label="Developer tool categories">
                    <div class="developer-chip-group">
                        <span class="developer-chip">JSON</span>
                        <span class="developer-chip">Encoding</span>
                        <span class="developer-chip">JWT</span>
                        <span class="developer-chip">Web</span>
                        <span class="developer-chip">Code</span>
                        <span class="developer-chip">Security</span>
                        <span class="developer-chip">URLs</span>
                        <span class="developer-chip">Date &amp; Time</span>
                    </div>

                    <div class="developer-mini-cards">
                        <a href="<?php echo $base_url; ?>json-formatter" class="developer-mini-card">
                            <span class="mini-card-icon"><i class="fas fa-code"></i></span>
                            <span>JSON Formatter</span>
                        </a>
                        <a href="<?php echo $base_url; ?>jwt-decoder" class="developer-mini-card">
                            <span class="mini-card-icon"><i class="fas fa-key"></i></span>
                            <span>JWT Decoder</span>
                        </a>
                        <a href="<?php echo $base_url; ?>url-encoder" class="developer-mini-card">
                            <span class="mini-card-icon"><i class="fas fa-link"></i></span>
                            <span>URL Encoder</span>
                        </a>
                        <a href="<?php echo $base_url; ?>hash-generator" class="developer-mini-card">
                            <span class="mini-card-icon"><i class="fas fa-fingerprint"></i></span>
                            <span>Hash Generator</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="qa-api-home-section py-5">
        <div class="container">
            <div class="qa-api-home-shell">
                <div class="qa-api-home-header">
                    <p class="eyebrow mb-2">QA &amp; API Testing</p>
                    <h2>QA &amp; API Testing</h2>
                    <p>Tools for QA engineers, SDETs, automation engineers and API testers.</p>
                </div>

                <div class="qa-api-workflow" aria-label="QA and API testing workflow">
                    <a href="<?php echo $base_url; ?>json-formatter" class="qa-api-step">
                        <span class="qa-api-step-name">JSON Formatter</span>
                    </a>
                    <span class="qa-api-arrow" aria-hidden="true">→</span>
                    <a href="<?php echo $base_url; ?>json-formatter" class="qa-api-step">
                        <span class="qa-api-step-name">JSON Validator</span>
                    </a>
                    <span class="qa-api-arrow" aria-hidden="true">→</span>
                    <a href="<?php echo $base_url; ?>text-comparison" class="qa-api-step">
                        <span class="qa-api-step-name">JSON Diff</span>
                    </a>
                    <span class="qa-api-arrow" aria-hidden="true">→</span>
                    <a href="<?php echo $base_url; ?>jwt-decoder" class="qa-api-step">
                        <span class="qa-api-step-name">JWT Decoder</span>
                    </a>
                    <span class="qa-api-arrow" aria-hidden="true">→</span>
                    <a href="<?php echo $base_url; ?>base64-encoder" class="qa-api-step">
                        <span class="qa-api-step-name">Base64</span>
                    </a>
                    <span class="qa-api-arrow" aria-hidden="true">→</span>
                    <a href="<?php echo $base_url; ?>guides/http-status-codes-api-testing" class="qa-api-step">
                        <span class="qa-api-step-name">HTTP Status</span>
                    </a>
                </div>

                <div class="qa-api-actions">
                    <a href="<?php echo $base_url; ?>qa-tools" class="qa-api-link">Explore QA Tools <span aria-hidden="true">→</span></a>
                    <a href="<?php echo $base_url; ?>api-testing-tools" class="qa-api-link">Explore API Testing Tools <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </section>

    <section id="devops-tools" class="tool-category-section py-5 bg-light-subtle">
        <div class="container">
            <div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <p class="eyebrow mb-1">Operations</p>
                    <h2 class="mb-0">DevOps tools</h2>
                </div>
                <a href="<?php echo $base_url; ?>devops-tools" class="text-decoration-none fw-semibold">Open category</a>
            </div>
            <div class="row g-3">
                <?php foreach ($devopsTools as $tool): ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="<?php echo $tool['url']; ?>" class="tool-list-card card h-100 border-0 shadow-sm rounded-4 text-decoration-none text-body">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <span class="mini-tool-icon"><i class="fas <?php echo $tool['icon']; ?>"></i></span>
                                    <h3 class="h6 mb-0"><?php echo htmlspecialchars($tool['title']); ?></h3>
                                </div>
                                <p class="small text-muted mb-0"><?php echo htmlspecialchars($tool['description']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="text-tools" class="tool-category-section py-5">
        <div class="container">
            <div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <p class="eyebrow mb-1">Content workflows</p>
                    <h2 class="mb-0">Text &amp; Content tools</h2>
                </div>
                <a href="<?php echo $base_url; ?>text-tools" class="text-decoration-none fw-semibold">Open category</a>
            </div>
            <div class="row g-3">
                <?php foreach ($textTools as $tool): ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="<?php echo $tool['url']; ?>" class="tool-list-card card h-100 border-0 shadow-sm rounded-4 text-decoration-none text-body">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <span class="mini-tool-icon"><i class="fas <?php echo $tool['icon']; ?>"></i></span>
                                    <h3 class="h6 mb-0"><?php echo htmlspecialchars($tool['title']); ?></h3>
                                </div>
                                <p class="small text-muted mb-0"><?php echo htmlspecialchars($tool['description']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="pdf-tools" class="tool-category-section py-5 bg-light-subtle">
        <div class="container">
            <div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <p class="eyebrow mb-1">Document processing</p>
                    <h2 class="mb-0">PDF tools</h2>
                </div>
                <a href="<?php echo $base_url; ?>pdf-tools" class="text-decoration-none fw-semibold">Open category</a>
            </div>
            <div class="row g-3">
                <?php foreach ($pdfTools as $tool): ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="<?php echo $tool['url']; ?>" class="tool-list-card card h-100 border-0 shadow-sm rounded-4 text-decoration-none text-body">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <span class="mini-tool-icon"><i class="fas <?php echo $tool['icon']; ?>"></i></span>
                                    <h3 class="h6 mb-0"><?php echo htmlspecialchars($tool['title']); ?></h3>
                                </div>
                                <p class="small text-muted mb-0"><?php echo htmlspecialchars($tool['description']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="calculators" class="tool-category-section py-5">
        <div class="container">
            <div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                <div>
                    <p class="eyebrow mb-1">Planning and decision making</p>
                    <h2 class="mb-0">Calculators</h2>
                </div>
                <a href="<?php echo $base_url; ?>calculators" class="text-decoration-none fw-semibold">Open category</a>
            </div>
            <div class="row g-3">
                <?php foreach ($calculatorTools as $tool): ?>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <a href="<?php echo $tool['url']; ?>" class="tool-list-card card h-100 border-0 shadow-sm rounded-4 text-decoration-none text-body">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <span class="mini-tool-icon"><i class="fas <?php echo $tool['icon']; ?>"></i></span>
                                    <h3 class="h6 mb-0"><?php echo htmlspecialchars($tool['title']); ?></h3>
                                </div>
                                <p class="small text-muted mb-0"><?php echo htmlspecialchars($tool['description']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="privacy-section py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <p class="eyebrow mb-2">Privacy-first</p>
                    <h2 class="mb-3">Most tools work in your browser</h2>
                    <p class="mb-3">WordsCompare is built for fast, lightweight productivity. Most tools process content locally in the browser, which means less friction, more privacy, and no unnecessary uploads.</p>
                    <p class="mb-0">This approach keeps the experience quick, secure, and accessible for developers, testers, and everyday users working on real tasks.</p>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <span class="feature-icon bg-success-subtle text-success"><i class="fas fa-shield-alt"></i></span>
                                <h3 class="h5 mb-0">Browser processing</h3>
                            </div>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Local processing reduces upload dependence</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Faster results for everyday edits and checks</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Better fit for content, JSON, text and PDF work</li>
                                <li><i class="fas fa-check text-success me-2"></i> Straightforward access on desktop and mobile</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-guides py-5 bg-light-subtle">
        <div class="container">
            <div class="section-header mb-4">
                <p class="eyebrow mb-1">Helpful starting points</p>
                <h2 class="mb-0">Popular guides</h2>
            </div>
            <div class="row g-3">
                <?php foreach ($guideCards as $guide): ?>
                    <div class="col-12 col-md-4">
                        <a href="<?php echo $guide['url']; ?>" class="guide-card card border-0 shadow-sm h-100 rounded-4 text-decoration-none text-body">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <span class="feature-icon"><i class="fas fa-book-open"></i></span>
                                    <i class="fas fa-arrow-right text-muted"></i>
                                </div>
                                <h3 class="h5 mb-2"><?php echo htmlspecialchars($guide['title']); ?></h3>
                                <p class="text-muted mb-0"><?php echo htmlspecialchars($guide['description']); ?></p>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <style>
        .home-page-shell .eyebrow {
            text-transform: uppercase;
            letter-spacing: 0.12em;
            font-size: 0.75rem;
            font-weight: 700;
            color: #dc3545;
        }

        .hero-panel {
            background: linear-gradient(135deg, #ffffff 0%, #f7f8fb 100%);
            border-bottom: 1px solid #edf0f5;
        }

        .hero-copy h1 {
            letter-spacing: -0.05em;
            line-height: 1.05;
            color: #111827;
        }

        /* Homepage uses the global search widget now; local inline search removed. */

        .search-result-item,
        .search-result-empty {
            display: block;
            padding: 0.8rem 1rem;
            color: #1f2937;
            text-decoration: none;
            border-bottom: 1px solid #eef2f7;
            font-size: 0.95rem;
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-item:hover,
        .search-result-item:focus-visible {
            background: #f8f9fb;
            color: #111827;
            text-decoration: none;
        }

        .hero-feature-card,
        .tool-card-link,
        .category-tile,
        .tool-list-card,
        .guide-card {
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .hero-feature-card:hover,
        .tool-card-link:hover,
        .category-tile:hover,
        .tool-list-card:hover,
        .guide-card:hover {
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08) !important;
            transform: translateY(-2px);
        }

        .feature-icon,
        .tool-icon,
        .mini-tool-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #fff5f5;
            color: #dc3545;
            width: 42px;
            height: 42px;
            flex-shrink: 0;
        }

        .mini-tool-icon {
            width: 34px;
            height: 34px;
            font-size: 0.85rem;
            background: #f3f6fb;
            color: #2b2d42;
        }

        .category-icon {
            width: 52px;
            height: 52px;
            font-size: 1.1rem;
        }

        .tool-card-link .card-body,
        .tool-list-card .card-body,
        .guide-card .card-body,
        .category-tile .card-body {
            height: 100%;
        }

        .tool-list-card,
        .guide-card,
        .category-tile,
        .tool-card-link {
            border-radius: 1.25rem !important;
        }

        .section-header a,
        .category-tile,
        .tool-list-card,
        .guide-card,
        .tool-card-link {
            text-decoration: none !important;
        }

        @media (max-width: 991.98px) {
            .hero-copy h1 {
                font-size: clamp(2.25rem, 6vw, 3.3rem);
            }
        }

        @media (max-width: 575.98px) {
            .hero-panel,
            .popular-tools,
            .tool-category-section,
            .privacy-section,
            .popular-guides {
                padding-top: 2.5rem !important;
                padding-bottom: 2.5rem !important;
            }

            .section-header {
                align-items: flex-start !important;
            }
        }
    </style>
</main>

    <!-- All Tools CTA (SEO + Accessibility optimized) -->
    <section class="py-5 bg-white">
        <div class="container px-4">
            <h2 class="text-center mb-3">How to Use These Tools <span class="text-danger">🛠️</span></h2>
            <p class="lead text-center text-muted mb-4">
                Quick, consistent steps to get accurate results from any tool on this site.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <ol class="step-list fs-6">
                        <li class="mb-3"><strong>Find the right tool:</strong> Browse categories (PDF, Text,
                            Developer,
                            Business, Calculators) or use the search bar to quickly locate a tool.</li>
                        <li class="mb-3"><strong>Open the tool page:</strong> Click the tool card to open its
                            dedicated
                            page where inputs and options are provided.</li>
                        <li class="mb-3"><strong>Read the instructions:</strong> Each tool shows a short instruction
                            and
                            sample input. Review any notes about supported file types and limits.</li>
                        <li class="mb-3"><strong>Provide input:</strong> Paste text or upload files using the
                            provided
                            input area. For file uploads, check the maximum file size noted on the tool page.</li>
                        <li class="mb-3"><strong>Adjust settings:</strong> Select output format, page range,
                            conversion
                            options, or other settings as needed.</li>
                        <li class="mb-3"><strong>Process:</strong> Click the primary action button (Convert /
                            Generate /
                            Calculate). Wait for the result — processing happens in your browser for privacy and
                            speed.
                        </li>
                        <li class="mb-3"><strong>Download or copy:</strong> When complete, download the file or copy
                            the
                            output text. Use the share buttons if you want to send results to others.</li>
                        <li class="mb-3"><strong>Clear & repeat:</strong> Clear the input to run another operation
                            or
                            try different settings.</li>
                    </ol>

                </div>
            </div>
        </div>

        <!-- Structured HowTo for SEO -->
        <script type="application/ld+json">
 {
 "@context": "https://schema.org",
 "@type": "HowTo",
 "name": "How to use the free online tools",
 "description": "Step-by-step instructions to find, use and download results from the free online tools.",
 "image": "<?php echo $base_url; ?>assets/images/tools-howto.png",
 "totalTime": "PT5M",
 "supply": [],
 "tool": [],
 "step": [
 {"@type":"HowToStep","name":"Find the right tool","text":"Browse categories or search to locate the required tool."},
 {"@type":"HowToStep","name":"Open the tool page","text":"Click the tool card to open its page."},
 {"@type":"HowToStep","name":"Read the instructions","text":"Review input requirements and file limits."},
 {"@type":"HowToStep","name":"Provide input","text":"Paste text or upload files as required."},
 {"@type":"HowToStep","name":"Adjust settings and process","text":"Choose options and click Convert/Generate/Calculate."},
 {"@type":"HowToStep","name":"Download or copy result","text":"Download the output file or copy the result text."}
 ],
 "url": "<?php echo $base_url; ?>all-tools"
 }
 </script>
    </section>


    <!-- Comprehensive Tools Guide Section -->
    <section class="tools-guide py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Complete Guide to Our Tools <span class="text-danger"></span></h2>

            <div class="row g-4">
                <!-- PDF Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-file-pdf text-danger me-2"></i>PDF Tools Guide</h3>
                        <p>Our PDF tools suite offers comprehensive file conversion capabilities. Convert PDFs to
                            various formats including Word, Excel, PowerPoint, and images. Supports batch
                            processing,
                            OCR text extraction, and metadata editing. Perfect for document management and digital
                            workflows.</p>
                    </div>
                </div>

                <!-- Calculator Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-calculator text-success me-2"></i>Financial Calculators
                        </h3>
                        <p>Access powerful financial calculators for investment planning, loans, and retirement.
                            Features include SIP calculator, EMI calculator, PPF calculator, and more. Get accurate
                            calculations for mutual funds, fixed deposits, and tax planning.</p>
                    </div>
                </div>

                <!-- Text Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-font text-primary me-2"></i>Text Manipulation Tools
                        </h3>
                        <p>Transform and analyze text with our specialized tools. Count words, convert case, remove
                            spaces, and generate slugs. Perfect for content creators, writers, and developers
                            needing
                            quick text operations.</p>
                    </div>
                </div>

                <!-- Developer Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-code text-info me-2"></i>Developer Utilities</h3>
                        <p>Essential tools for developers including JSON formatter, code beautifier, and syntax
                            highlighter. Streamline your development workflow with our efficient and reliable
                            development utilities.</p>
                    </div>
                </div>

                <!-- Business Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-briefcase text-warning me-2"></i>Business Tools</h3>
                        <p>Enhance your business operations with our specialized tools. Generate professional
                            calendars,
                            create offer letters, manage payroll sheets, and track employee time. Ideal for HR and
                            business management.</p>
                    </div>
                </div>

                <!-- Web Tools Guide -->
                <div class="col-lg-4 mb-4">
                    <div class="guide-card p-4 bg-white rounded-3 shadow-sm h-100">
                        <h3 class="h5 mb-3"><i class="fas fa-globe text-purple me-2"></i>Web Utilities</h3>
                        <p>Access essential web tools including password generator, QR code creator, and color
                            picker.
                            Perfect for web developers and designers needing quick, reliable online utilities.</p>
                    </div>
                </div>
            </div>

            <!-- Tool Usage Tips -->
            <div class="mt-5 pt-4">
                <h2 class="mb-4">Pro Tips for Professional Results <span class="emoji">💡</span></h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-danger h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-bolt text-danger me-2"></i>Batch Conversion
                            </h4>
                            <p class="text-muted small mb-0">Save time by uploading multiple documents once. Our
                                cloud-native API processes large batches with 99.9% accuracy.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-info h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-eye text-info me-2"></i>Enable OCR</h4>
                            <p class="text-muted small mb-0">Converting a scanned image? Toggle the OCR setting to
                                extract editable text from non-searchable PDFs instantly.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-success h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-table text-success me-2"></i>Smart Data
                                Extraction</h4>
                            <p class="text-muted small mb-0">For PDF-to-Excel, our intelligent fallback ensures
                                layout preservation even for files without formal table structures.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-warning h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-shield-alt text-warning me-2"></i>Privacy
                                First</h4>
                            <p class="text-muted small mb-0">All document processing happens securely. Your files
                                are automatically deleted from our servers immediately after conversion.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-primary h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-keyboard text-primary me-2"></i>Quick
                                Access</h4>
                            <p class="text-muted small mb-0">Use the smart search bar (Ctrl+K or Cmd+K) to find any
                                of our 100+ tools in less than a second.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white rounded shadow-sm border-start border-4 border-secondary h-100">
                            <h4 class="h5 mb-3 fw-bold"><i class="fas fa-mobile-alt text-secondary me-2"></i>Work
                                from Anywhere</h4>
                            <p class="text-muted small mb-0">Access all premium tools on your mobile browser. No app
                                installation required for high-speed PDF tasks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Features Section -->
    <section class="tools-section bg-white border-top">
        <div class="container">
            <h2 class="mb-5">Why Choose <?php echo $site_name; ?>? <span class="emoji"></span></h2>
            <div class="row g-3">
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-shield-alt text-danger"></i>
                        <h3>Secure</h3>
                        <p>Your data stays on your device. We never store anything.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-bolt text-danger"></i>
                        <h3>Fast</h3>
                        <p>Instant results with optimized processing.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-heart text-danger"></i>
                        <h3>100% Free</h3>
                        <p>No subscriptions, no hidden costs.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-mobile-alt text-danger"></i>
                        <h3>Mobile Ready</h3>
                        <p>Works on all devices and screens.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-user-tie text-danger"></i>
                        <h3>No Login</h3>
                        <p>Start using instantly without registration.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="feature-box">
                        <i class="fas fa-headset text-danger"></i>
                        <h3>Support</h3>
                        <p>Help available 24/7 for all users.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="sharer">
        <?php include 'includes/sharer.php'; ?>
    </div>

    <!-- FAQ Section -->
    <section class="faq-section bg-light">
        <div class="container">
            <h2 class="mb-5">Frequently Asked Questions <span class="emoji"></span></h2>
            <div class="row g-3">
                <div class="col-lg-6">
                    <div class="accordion" id="faqAccordion1">
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq1">
                                    <i class="fas fa-lock text-danger me-2"></i> Is my data secure?
                                </button>
                            </h3>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">All processing happens in your browser. We never upload
                                    your
                                    data to our servers.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq2">
                                    <i class="fas fa-dollar-sign text-danger me-2"></i> Is this really free?
                                </button>
                            </h3>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">Yes! All tools are completely free with no usage limits.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq3">
                                    <i class="fas fa-file-upload text-danger me-2"></i> What's the file size limit?
                                </button>
                            </h3>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">Most tools support files up to 50MB, depending on your
                                    device's memory.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq4">
                                    <i class="fas fa-mobile-alt text-danger me-2"></i> Does it work on mobile?
                                </button>
                            </h3>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">Yes! All tools work on smartphones, tablets, and
                                    computers.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq13">
                                    <i class="fas fa-image text-danger me-2"></i> Can I convert images to PDF?
                                </button>
                            </h3>
                            <div id="faq13" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Yes, we offer multiple image to PDF conversion tools.
                                    You
                                    can convert JPG to PDF, PNG to PDF, WebP to PDF, and even create PDFs from
                                    multiple
                                    images. We also have PDF to image converter for the reverse process.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq14">
                                    <i class="fas fa-code text-danger me-2"></i> Do you have tools for developers?
                                </button>
                            </h3>
                            <div id="faq14" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Absolutely! We have many developer tools including JSON
                                    formatter, XML formatter, HTML formatter, code minifiers, base64
                                    encoder/decoder,
                                    URL encoder/decoder, and more. These tools help developers format, validate, and
                                    convert code easily.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq15">
                                    <i class="fas fa-qrcode text-danger me-2"></i> Can I generate QR codes?
                                </button>
                            </h3>
                            <div id="faq15" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Yes, our QR code generator allows you to create QR codes
                                    for
                                    URLs, text, contact information, WiFi credentials, and more. You can customize
                                    the
                                    size and download the QR code in various formats.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq16">
                                    <i class="fas fa-globe text-danger me-2"></i> Is WordsCompare available
                                    worldwide?
                                </button>
                            </h3>
                            <div id="faq16" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Yes, WordsCompare is accessible from anywhere in the
                                    world.
                                    All you need is an internet connection and a web browser. Our tools work
                                    globally
                                    and support multiple languages and formats.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="faqAccordion2">
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq5">
                                    <i class="fas fa-cloud text-danger me-2"></i> Do I need an account?
                                </button>
                            </h3>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">No accounts needed! Start using immediately without
                                    registration.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq6">
                                    <i class="fas fa-globe text-danger me-2"></i> What browsers are supported?
                                </button>
                            </h3>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">All modern browsers including Chrome, Firefox, Safari,
                                    and
                                    Edge.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq7">
                                    <i class="fas fa-history text-danger me-2"></i> Is usage tracked?
                                </button>
                            </h3>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">No, we don't track or store your usage history.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq8">
                                    <i class="fas fa-question-circle text-danger me-2"></i> How to contact support?
                                </button>
                            </h3>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Use our contact form for any questions or issues.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq9">
                                    <i class="fas fa-file-pdf text-danger me-2"></i> What PDF tools are available?
                                </button>
                            </h3>
                            <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">We offer comprehensive PDF tools including PDF to Word
                                    converter, PDF to Excel converter, PDF to PowerPoint, PDF to image converter,
                                    image
                                    to PDF converter, merge PDF, split PDF, compress PDF, and many more. All tools
                                    work
                                    directly in your browser.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq10">
                                    <i class="fas fa-calculator text-danger me-2"></i> What calculators do you
                                    offer?
                                </button>
                            </h3>
                            <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Our calculator collection includes EMI calculator, GST
                                    calculator, BMI calculator, age calculator, loan eligibility calculator,
                                    investment
                                    return calculator, compound interest calculator, and many more financial and
                                    health
                                    calculators.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq11">
                                    <i class="fas fa-mobile-alt text-danger me-2"></i> Can I use these tools on my
                                    phone?
                                </button>
                            </h3>
                            <div id="faq11" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Yes! All our tools are fully responsive and work
                                    perfectly
                                    on mobile phones, tablets, and desktop computers. You can access our PDF
                                    converter,
                                    calculators, and text utilities from any device with a web browser.</div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 rounded-3 overflow-hidden shadow-sm mb-3">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq12">
                                    <i class="fas fa-font text-danger me-2"></i> What text utilities are available?
                                </button>
                            </h3>
                            <div id="faq12" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">Our text utilities include word counter, character
                                    counter,
                                    case converter, text comparison tool, find and replace, text to slug converter,
                                    JSON
                                    formatter, and more. These tools are perfect for writers, editors, and content
                                    creators.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <p class="lead mb-4 text-center">WordsCompare provides a comprehensive suite of free online
                        tools
                        designed to make your daily tasks easier. From PDF conversion to text analysis, calculators
                        to
                        file formatters, our tools are built with simplicity and efficiency in mind.</p>

                    <div class="row text-start mt-5">
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-bolt text-warning me-2"></i>Fast & Efficient Processing</h5>
                            <p>All tools process your data instantly in your browser. No waiting, no queues - get
                                results immediately. Our client-side processing ensures your files are handled
                                quickly
                                without server delays.</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-shield-alt text-success me-2"></i>Secure & Private</h5>
                            <p>Your files never leave your computer. All processing happens locally in your browser
                                for
                                maximum privacy and security. We don't store, track, or access your data.</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-dollar-sign text-info me-2"></i>Completely Free Forever</h5>
                            <p>No hidden fees, no subscriptions, no credit cards required. All tools are free to use
                                without any limitations. Enjoy unlimited access to all our utilities.</p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5><i class="fas fa-mobile-alt text-primary me-2"></i>Mobile Friendly Design</h5>
                            <p>Access all tools from any device - desktop, tablet, or smartphone. Our responsive
                                design
                                ensures perfect usability across all screen sizes.</p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h3 class="h4 mb-3">About Our Wordscompare Online Tools</h3>
                        <p>Looking for a fast and secure online PDF convertor? WordsCompare provides a complete
                            suite of
                            PDF tools including PDF converter, PDF merger, JPG to PDF, PDF to image convertor, and
                            Excel
                            to PDF convertor — all in one place. No registration required. 100% free and
                            browser-based.
                        </p>
                        <p>WordsCompare is your one-stop destination for free online utilities. Whether you need to
                            convert PDF documents, calculate financial figures, compare text files, or format code -
                            we
                            have the tools you need. Our platform offers over 100 different utilities spanning
                            multiple
                            categories including document conversion, text manipulation, mathematical calculations,
                            and
                            developer tools.</p>
                        <p>Each tool is designed with user experience in mind. We prioritize simplicity without
                            sacrificing functionality. You don't need to create an account, provide personal
                            information, or download any software. Simply visit our website, select the tool you
                            need,
                            and get your work done efficiently.</p>
                        <p>Our powerful PDF converter allows you to convert documents in seconds. Whether you need
                            to
                            convert PDF to Excel, image to PDF, or photo to PDF convertor tools, everything works
                            directly in your browser for fast and secure processing.</p>
                        <p>Convert PDF pages into high-quality images using our PDF to image convertor. You can also
                            use
                            our online image to PDF convertor or photo to PDF convertor to create professional PDF
                            documents from JPG or PNG files.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Popular Tools & Features</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-file-pdf text-danger fa-2x mb-3"></i>
                        <h5>PDF Conversion Tools</h5>
                        <p>Convert PDFs to Word, Excel, PowerPoint, images, and more. Our PDF tools maintain
                            formatting
                            and quality while ensuring fast conversion. Support for batch processing and multiple
                            output
                            formats.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-calculator text-primary fa-2x mb-3"></i>
                        <h5>Smart Financial Calculators</h5>
                        <p>Comprehensive financial calculators for EMI, GST, BMI, age, loan eligibility, and more.
                            Get
                            accurate results instantly with detailed breakdowns and visual representations of your
                            calculations.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-font text-success fa-2x mb-3"></i>
                        <h5>Text Utilities & Analysis</h5>
                        <p>Advanced word counter, case converter, text comparison with diff highlighting, find and
                            replace, and more tools for text manipulation. Perfect for writers, editors, and content
                            creators.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-image text-warning fa-2x mb-3"></i>
                        <h5>Image Conversion Tools</h5>
                        <p>Convert images to PDF, compare images side by side, and access various image processing
                            utilities. Support for JPG, PNG, WebP, and other popular formats.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-code text-info fa-2x mb-3"></i>
                        <h5>Developer & Code Tools</h5>
                        <p>JSON formatter, XML formatter, code beautifiers, minifiers, and utilities for developers
                            and
                            programmers. Make your coding tasks easier with our specialized tools.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-white rounded shadow-sm h-100">
                        <i class="fas fa-qrcode text-secondary fa-2x mb-3"></i>
                        <h5>QR Code Generator</h5>
                        <p>Create QR codes instantly for URLs, text, contact information, WiFi credentials, and
                            more.
                            Customize size and download in various formats for print or digital use.</p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">
                    <h3 class="h4 mb-3">More Than 100 Free Tools Available</h3>
                    <p>Our extensive collection includes document converters, data formatters, unit converters,
                        password
                        generators, color pickers, and specialized utilities for business, education, and personal
                        use.
                        Every tool is designed to be intuitive and efficient, helping you complete tasks quickly
                        without
                        any learning curve.</p>
                    <p>Whether you're a student working on assignments, a professional handling documents, a
                        developer
                        writing code, or anyone needing quick utilities - WordsCompare has something for you.
                        Explore
                        our categories and discover tools that can save you time and effort every day.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-5">How It Works</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-mouse-pointer fa-lg"></i>
                        </div>
                        <h5>1. Select Tool</h5>
                        <p>Choose from our wide range of free online tools.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-upload fa-lg"></i>
                        </div>
                        <h5>2. Upload/Input</h5>
                        <p>Upload your file or enter your text/data.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-cog fa-lg"></i>
                        </div>
                        <h5>3. Process</h5>
                        <p>Our tool processes your data instantly.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <div class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-download fa-lg"></i>
                        </div>
                        <h5>4. Download</h5>
                        <p>Get your results and download instantly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SEO Content Section -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h2>Free Online PDF Converter and Document Tools</h2>
                    <p class="lead mb-5">WordsCompare offers the best free online PDF converter tools,
                        calculators, and utilities to help you work smarter and faster.</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <h4>Comprehensive PDF Conversion Solutions</h4>
                            <p>Our PDF converter tools are designed to handle all your document conversion needs.
                                Whether you need to convert PDF to Excel for data analysis, PDF to Word for editing,
                                or
                                PDF to PowerPoint for presentations, our tools deliver professional-quality results.
                                The
                                PDF to image converter allows you to extract pages as high-quality JPG or PNG files,
                                while our image to PDF converter helps you create professional documents from
                                scanned
                                images or photos.</p>
                            <p>Business users appreciate our batch processing capabilities and the ability to
                                maintain
                                formatting during conversion. Students find our tools invaluable for converting
                                academic
                                papers and research documents between different formats. All conversions happen
                                securely
                                in your browser, ensuring your sensitive documents remain private.</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Smart Calculators for Every Need</h4>
                            <p>Our collection of online calculators covers financial, health, and mathematical
                                calculations. The EMI calculator helps you plan loans by computing equated monthly
                                installments with detailed amortization schedules. Use our GST calculator to quickly
                                compute tax amounts for business transactions. The BMI calculator provides instant
                                health assessments with category classifications.</p>
                            <p>Financial planning becomes easier with our investment calculators, compound interest
                                tools, and retirement planners. Business owners benefit from our margin calculator,
                                discount calculator, and currency converters. Each calculator provides accurate
                                results
                                with detailed breakdowns, helping you make informed decisions for personal and
                                professional use.</p>
                        </div>
                    </div>

                    <div class="row g-4 mt-4">
                        <div class="col-md-6">
                            <h4>Text Analysis and Content Tools</h4>
                            <p>Content creators and writers rely on our text utilities for daily tasks. The word
                                counter
                                provides detailed statistics including character count, sentence count, and reading
                                time
                                estimates. Our case converter transforms text between uppercase, lowercase, title
                                case,
                                and sentence case formats instantly. The text comparison tool highlights differences
                                between two documents, making it perfect for proofreading and version control.</p>
                            <p>Additional text tools include find and replace functionality, text-to-slug conversion
                                for
                                SEO-friendly URLs, and duplicate line removal. Developers appreciate our JSON
                                formatter
                                and XML beautifier for cleaning up code. These tools process everything locally in
                                your
                                browser, ensuring your content remains confidential and secure.</p>
                        </div>
                        <div class="col-md-6">
                            <h4>Developer and Technical Utilities</h4>
                            <p>Software developers find essential tools in our platform. Code formatters for HTML,
                                CSS,
                                and JavaScript help maintain consistent coding standards. Base64 encoding and
                                decoding
                                utilities simplify data transformation tasks. URL encoders ensure special characters
                                are
                                properly formatted for web use. The QR code generator creates scannable codes for
                                websites, contact information, and WiFi credentials.</p>
                            <p>Our platform also includes color pickers with hex and RGB values, password generators
                                for
                                secure credential creation, and unit converters for technical calculations. All
                                developer tools are designed with simplicity in mind, requiring no installation or
                                registration. Whether you're debugging code, formatting data, or generating assets,
                                our
                                tools streamline your workflow.</p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h3 class="h4 mb-3">Why Thousands Choose WordsCompare Daily</h3>
                        <p>WordsCompare has become the preferred destination for free online tools because we
                            prioritize
                            user experience, privacy, and reliability. Unlike many online services, we never require
                            registration or personal information. Our browser-based processing means your files
                            never
                            leave your computer, eliminating security concerns associated with cloud uploads.</p>
                        <p>The platform is continuously updated with new tools based on user feedback and emerging
                            needs. Our responsive design ensures perfect functionality across desktop computers,
                            tablets, and smartphones. Whether you need a quick PDF conversion, financial
                            calculation, or
                            text analysis, WordsCompare delivers professional results instantly without cost or
                            complexity.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>