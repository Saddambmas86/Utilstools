<?php
$page_title = 'How to Compare API Responses';
$page_description = 'A practical guide to compare API responses, highlight regressions, and validate differences.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <h1>How to Compare API Responses</h1>
    <p>Problem: Detect regressions or changes between two API responses from different environments or versions.</p>

    <h2>Steps</h2>
    <ol>
        <li>Run the API in environment A and copy the response.</li>
        <li>Run the API in environment B and copy that response.</li>
        <li>Open <a href="<?php echo $base_url; ?>text-comparison">Text Compare</a> and paste responses side-by-side.</li>
        <li>Optionally prettify JSON responses first with <a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a>.</li>
    </ol>

    <h3>Example</h3>
    <pre>// Response A
{"status":"ok","count":10}

// Response B
{"status":"ok","count":11}
    </pre>
    <p>The diff will show the change in the <code>count</code> field.</p>

    <h2>Related tools</h2>
    <ul>
        <li><a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a></li>
        <li><a href="<?php echo $base_url; ?>json-viewer">JSON Viewer</a></li>
        <li><a href="<?php echo $base_url; ?>text-comparison">Text Compare</a></li>
    </ul>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
