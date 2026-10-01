<?php
// sitemap.php - dynamically generate a sitemap.xml from views
header('Content-Type: application/xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>\n';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">\n';

$base = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . rtrim(str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname(__FILE__)), '/');
if (substr($base, -1) !== '/') $base .= '/';

$pages = [];
// include root
$pages[] = ['loc' => $base, 'file' => __FILE__];

// static root pages
$static = ['about.php','contact.php','privacy.php','disclaimer.php','index.php'];
foreach ($static as $f) {
    $p = __DIR__ . '/' . $f;
    if (file_exists($p)) {
        $slug = $f === 'index.php' ? '' : str_replace('.php','',$f);
        $pages[] = ['loc' => $base . $slug, 'file' => $p];
    }
}

// categories
$catdir = __DIR__ . '/views/category';
if (is_dir($catdir)) {
    foreach (scandir($catdir) as $f) {
        if (substr($f,-4) === '.php') {
            $slug = str_replace('.php','',$f);
            $pages[] = ['loc' => $base . $slug, 'file' => $catdir . '/' . $f];
        }
    }
}

// tools
$tooldir = __DIR__ . '/views/tools';
if (is_dir($tooldir)) {
    foreach (scandir($tooldir) as $f) {
        if (substr($f,-4) === '.php') {
            $slug = str_replace('.php','',$f);
            // exclude internal helpers (if any) by simple rule: skip files starting with _
            if (strpos($slug, '_') === 0) continue;
            $pages[] = ['loc' => $base . $slug, 'file' => $tooldir . '/' . $f];
        }
    }
}

$seen = [];
foreach ($pages as $p) {
    // normalize URL (no query string, remove trailing slash except root)
    $loc = preg_replace('#/+$#','/',$p['loc']);
    $loc = rtrim($loc, '/');
    if ($loc === '') $loc = $base;
    if (isset($seen[$loc])) continue;
    $seen[$loc] = true;
    $lastmod = file_exists($p['file']) ? date('Y-m-d\TH:i:sP', filemtime($p['file'])) : date('c');
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($loc) . "</loc>\n";
    echo "    <lastmod>$lastmod</lastmod>\n";
    echo "    <changefreq>weekly</changefreq>\n";
    echo "    <priority>0.6</priority>\n";
    echo "  </url>\n";
}

echo '</urlset>';
exit;
