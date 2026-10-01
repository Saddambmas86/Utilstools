<?php
// Enhanced SEO panel: determine parent category and related tools/guides for this tool page
include_once __DIR__ . '/category-data.php';
if (!isset($slug)) {
    $request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $slug = trim($request_path, '/');
}

$tool_title = isset($page_title) ? $page_title : ucwords(str_replace('-', ' ', $slug));
$tool_description_short = isset($page_description) ? $page_description : '';
$canonical = isset($canonical_url) && !empty($canonical_url) ? $canonical_url : rtrim($canonical_base_url, '/') . '/' . $slug;

// Find parent category and group
$parent_category_key = null;
$parent_group_title = null;
foreach ($wordscompare_categories as $cat_key => $cat_data) {
    foreach ($cat_data['groups'] as $group) {
        foreach ($group['tools'] as $t) {
            if (isset($t['slug']) && $t['slug'] === $slug) {
                $parent_category_key = $cat_key;
                $parent_group_title = $group['title'];
                break 3;
            }
        }
    }
}
if (!$parent_category_key) {
    // fallback: developer-tools
        $parent_category_key = 'developer-tools';
}
$parent_category = $wordscompare_categories[$parent_category_key];

// Small breadcrumb and intro block placed under the navbar for tool pages
?>
<div class="container mt-3">
    <nav aria-label="Breadcrumb" class="mb-3">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo $base_url; ?>" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo $base_url . $parent_category['slug']; ?>" class="text-decoration-none"><?php echo htmlspecialchars($parent_category['title']); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($tool_title); ?></li>
        </ol>
    </nav>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-3 p-md-4 d-flex flex-column flex-md-row align-items-start gap-3">
            <div class="flex-grow-1">
                <h1 class="h4 mb-2"><?php echo htmlspecialchars($tool_title); ?></h1>
                <p class="small text-muted mb-0"><?php echo htmlspecialchars($tool_description_short); ?></p>
            </div>
            <div class="text-end">
                <a href="<?php echo $canonical; ?>" class="btn btn-sm btn-outline-secondary">Permalink</a>
            </div>
        </div>
    </div>
</div>

<?php
// Build related tools list (3-6 links) using category proximity
$candidates = [];

// 1) Siblings in same group
foreach ($wordscompare_categories[$parent_category_key]['groups'] as $group) {
    if ($group['title'] === $parent_group_title) {
        foreach ($group['tools'] as $t) {
            if ($t['slug'] !== $slug) $candidates[$t['slug']] = $t['title'];
        }
        break;
    }
}

// 2) Other tools in same category
foreach ($wordscompare_categories[$parent_category_key]['groups'] as $group) {
    foreach ($group['tools'] as $t) {
        if ($t['slug'] !== $slug && !isset($candidates[$t['slug']])) $candidates[$t['slug']] = $t['title'];
    }
}

// 3) Tools from related categories
foreach ($parent_category['related'] as $rel_cat_key) {
    if (!isset($wordscompare_categories[$rel_cat_key])) continue;
    foreach ($wordscompare_categories[$rel_cat_key]['groups'] as $group) {
        foreach ($group['tools'] as $t) {
            if ($t['slug'] !== $slug && !isset($candidates[$t['slug']])) $candidates[$t['slug']] = $t['title'];
        }
    }
}

// Filter candidates to existing tool view files and limit 6
$related = [];
foreach ($candidates as $cslug => $ctitle) {
    $file = __DIR__ . '/../views/tools/' . $cslug . '.php';
    if (file_exists($file)) {
        $related[$cslug] = $ctitle;
    }
    if (count($related) >= 6) break;
}

// If still too few, include some hardcoded fallbacks if available
if (count($related) < 3) {
    $fallbacks = ['json-formatter'=>'JSON Formatter','text-comparison'=>'Text Compare','json-viewer'=>'JSON Viewer','jwt-decoder'=>'JWT Decoder','base64-encoder'=>'Base64 Encoder'];
    foreach ($fallbacks as $fslug => $flabel) {
        if ($fslug === $slug) continue;
        if (!isset($related[$fslug]) && file_exists(__DIR__ . '/../views/tools/' . $fslug . '.php')) {
            $related[$fslug] = $flabel;
        }
        if (count($related) >= 3) break;
    }
}

// Find short list of guides that reference this tool by filename or content
$related_guides = [];
$content_dir = __DIR__ . '/../views/content';
if (is_dir($content_dir)) {
    foreach (scandir($content_dir) as $cf) {
        if (substr($cf,-4) !== '.php') continue;
        $path = $content_dir . '/' . $cf;
        $lower = strtolower($cf);
        if (strpos($lower, $slug) !== false) {
            // create link slug by removing .php and any -content suffix
            $gslug = str_replace('.php','',$cf);
            $gslug = preg_replace('/-content$/','',$gslug);
            $related_guides[$gslug] = ucwords(str_replace(['-','_'], ' ', $gslug));
            continue;
        }
        $contents = file_get_contents($path);
        if ($contents && stripos($contents, str_replace('-', ' ', $slug)) !== false) {
            $gslug = str_replace('.php','',$cf);
            $gslug = preg_replace('/-content$/','',$gslug);
            $related_guides[$gslug] = ucwords(str_replace(['-','_'], ' ', $gslug));
        }
        if (count($related_guides) >= 2) break;
    }
}

// current slug
$current_slug = $slug;

// ensure link to parent category is present (used in breadcrumb)
?>
<div class="container mb-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-3">
            <h2 class="h6 mb-2">Related tools</h2>
            <div class="d-flex flex-wrap gap-2">
                <?php foreach ($related as $rslug => $rlabel): ?>
                    <a href="<?php echo $base_url . $rslug; ?>" class="btn btn-sm btn-outline-secondary rounded-pill"><?php echo htmlspecialchars($rlabel); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php
if (!empty($related_guides)): ?>
<div class="container mb-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-3">
            <h2 class="h6 mb-2">Related guides</h2>
            <div class="d-flex flex-column gap-2">
                <?php foreach ($related_guides as $gslug => $gtitle): ?>
                    <?php $gpath = __DIR__ . '/../views/content/' . $gslug . '.php';
                    if (!file_exists($gpath)) continue; ?>
                    <a href="<?php echo $base_url . $gslug; ?>" class="text-decoration-none small"><?php echo htmlspecialchars($gtitle); ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php
endif;

// Structured data: basic WebPage schema for the tool
?>
<script type="application/ld+json">
<?php echo json_encode([
    "@context" => "https://schema.org",
    "@type" => "WebPage",
    "name" => strip_tags($tool_title),
    "description" => strip_tags($tool_description_short),
    "url" => $canonical,
    "inLanguage" => "en-US",
]); ?>
</script>

<!-- BreadcrumbList structured data -->
<script type="application/ld+json">
<?php echo json_encode([
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => "Home",
            "item" => rtrim($canonical_base_url, '/')
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "name" => "Tools",
            "item" => rtrim($base_url, '/') . '/developer-tools'
        ],
        [
            "@type" => "ListItem",
            "position" => 3,
            "name" => strip_tags($tool_title),
            "item" => $canonical
        ]
    ]
]); ?>
</script>
