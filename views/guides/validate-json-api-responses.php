<?php
$page_title = 'How to Validate JSON API Responses';
$page_description = 'Validate JSON API responses for syntax, required fields, and basic content checks.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <h1>How to Validate JSON API Responses</h1>
    <p>Problem: Ensure API responses are valid JSON and contain required fields.</p>

    <h2>Steps</h2>
    <ol>
        <li>Paste the response into <a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a> to check syntax.</li>
        <li>Use <a href="<?php echo $base_url; ?>json-viewer">JSON Viewer</a> to inspect required fields.</li>
        <li>For automated checks, extract key fields and compare against expected values using <a href="<?php echo $base_url; ?>text-comparison">Text Compare</a>.</li>
    </ol>

    <h3>Example</h3>
    <pre>{"id":123,"status":"ok"}</pre>
    <p>Confirm <code>id</code> exists and is numeric; confirm <code>status</code> is expected.</p>

    <h2>Related tools</h2>
    <ul>
        <li><a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a></li>
        <li><a href="<?php echo $base_url; ?>text-comparison">Text Compare</a></li>
    </ul>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
