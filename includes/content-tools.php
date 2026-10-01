<?php
// Detect tools referenced by a guide and render a small tools list
include_once __DIR__ . '/category-data.php';
if (!isset($maybe_slug)) {
    $req = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $maybe_slug = trim($req, '/');
}
$content_file = __DIR__ . '/../views/content/' . $maybe_slug . '.php';
if (!file_exists($content_file)) return;

$content = file_get_contents($content_file);
if (!$content) return;

$found = [];
// look for tool slugs in filename or content (slug or human-readable title)
foreach ($wordscompare_categories as $cat) {
    foreach ($cat['groups'] as $group) {
        foreach ($group['tools'] as $t) {
            $slug = $t['slug'];
            if (isset($found[$slug])) continue;
            // match slug in filename or slug/words in content
            if (stripos($content, $slug) !== false || stripos($content, str_replace('-', ' ', $slug)) !== false) {
                $file = __DIR__ . '/../views/tools/' . $slug . '.php';
                if (file_exists($file)) {
                    $found[$slug] = $t['title'];
                }
            }
        }
    }
}

if (empty($found)) return;

// limit to 6 and keep order
$found = array_slice($found, 0, 6, true);
?>
<div class="container mt-3">
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-3 d-flex flex-column flex-md-row align-items-start justify-content-between gap-3">
            <div>
                <h2 class="h6 mb-2">Tools used in this guide</h2>
                <p class="small text-muted mb-2">Run these utilities while following the steps in this guide.</p>
                <div class="d-flex flex-wrap gap-2">
                    <?php foreach ($found as $fslug => $flabel): ?>
                        <a href="<?php echo $base_url . $fslug; ?>" class="btn btn-sm btn-outline-primary rounded-pill"><?php echo htmlspecialchars($flabel); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
