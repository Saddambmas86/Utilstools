<?php
// Lightweight search endpoint. Returns JSON list of matching categories and tools.
header('Content-Type: application/json; charset=utf-8');
include_once __DIR__ . '/includes/category-data.php';

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$qnorm = mb_strtolower($q);

$tools = [];
// Flatten tools with metadata
foreach ($wordscompare_categories as $cat_key => $cat) {
    foreach ($cat['groups'] as $group) {
        foreach ($group['tools'] as $t) {
            $slug = $t['slug'];
            $title = $t['title'];
            $desc = isset($t['description']) ? $t['description'] : '';
            $tools[$slug] = [
                'slug' => $slug,
                'title' => $title,
                'description' => $desc,
                'category_key' => $cat_key,
                'category_title' => $cat['title'],
                'group' => $group['title']
            ];
        }
    }
}

$results = ['categories' => [], 'tools' => []];
if ($qnorm === '') {
    // empty query: return nothing (client shows empty state)
    echo json_encode($results);
    exit;
}

// Score function: higher score for startswith or exact, then contains in title, group, category, description
function score_item($haystack, $q) {
    $h = mb_strtolower($haystack);
    if ($h === $q) return 100;
    if (mb_substr($h,0,mb_strlen($q)) === $q) return 75;
    if (mb_strpos($h, $q) !== false) return 50;
    return 0;
}

// Match categories
foreach ($wordscompare_categories as $cat_key => $cat) {
    $score = max(score_item($cat['title'], $qnorm), score_item($cat['intro'], $qnorm));
    if ($score > 0) {
        $results['categories'][] = ['slug' => $cat['slug'], 'title' => $cat['title'], 'score' => $score];
    }
}

// Match tools
foreach ($tools as $slug => $t) {
    $s = 0;
    $s = max($s, score_item($t['title'], $qnorm));
    $s = max($s, score_item($t['group'], $qnorm));
    $s = max($s, score_item($t['category_title'], $qnorm));
    $s = max($s, score_item($t['description'], $qnorm));
    $s = max($s, score_item($t['slug'], $qnorm));
    if ($s > 0) {
        $t['score'] = $s;
        $results['tools'][] = $t;
    }
}

// sort results by score desc then title
usort($results['categories'], function($a,$b){ if ($a['score']==$b['score']) return strcmp($a['title'],$b['title']); return $b['score'] - $a['score']; });
usort($results['tools'], function($a,$b){ if ($a['score']==$b['score']) return strcmp($a['title'],$b['title']); return $b['score'] - $a['score']; });

// group tools by category for client-side grouped display
$grouped = [];
foreach ($results['tools'] as $t) {
    $ck = $t['category_key'];
    if (!isset($grouped[$ck])) $grouped[$ck] = ['category_title' => $t['category_title'], 'items' => []];
    $grouped[$ck]['items'][] = $t;
}

// limit overall tools to 50
foreach ($grouped as $ck => $g) {
    $grouped[$ck]['items'] = array_slice($g['items'], 0, 10);
}

echo json_encode(['query' => $q, 'categories' => $results['categories'], 'groups' => $grouped]);
