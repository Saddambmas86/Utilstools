<?php
$page_title = 'How to Validate JSON';
$page_description = 'Learn how to validate JSON syntax and common schema checks using WordsCompare utilities.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <h1>How to Validate JSON</h1>
    <p>Problem: Ensure JSON is syntactically correct before sending to APIs or storing.</p>

    <h2>Steps</h2>
    <ol>
        <li>Open <a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a> to check syntax.</li>
        <li>Paste JSON and run format — errors will be indicated with location.</li>
        <li>For content-level checks, inspect fields using <a href="<?php echo $base_url; ?>json-viewer">JSON Viewer</a>.</li>
    </ol>

    <h3>Example invalid JSON</h3>
    <pre>{"id":1,"name":"Alice",}</pre>
    <p>The trailing comma is invalid; the formatter will point to the comma location.</p>

    <h2>Related tools</h2>
    <ul>
        <li><a href="<?php echo $base_url; ?>json-viewer">JSON Viewer</a></li>
        <li><a href="<?php echo $base_url; ?>text-comparison">Text Compare</a> — compare expected vs actual JSON strings.</li>
    </ul>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
