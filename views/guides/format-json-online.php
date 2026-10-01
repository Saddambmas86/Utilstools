<?php
$page_title = 'How to Format JSON Online';
$page_description = 'Step-by-step: format and prettify JSON using the JSON Formatter tool with examples and expected output.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <h1>How to Format JSON Online</h1>
    <p>Problem: You have a compact or minified JSON payload and need readable, validated output.</p>

    <h2>Steps</h2>
    <ol>
        <li>Open the <a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a>.</li>
        <li>Paste your JSON into the input area.</li>
        <li>Click <strong>Format</strong>. The tool will prettify and validate the JSON.</li>
    </ol>

    <h3>Example input</h3>
    <pre>{"name":"Alice","age":30,"roles":["dev","admin"]}</pre>

    <h3>Example output</h3>
    <pre> {
  "name": "Alice",
  "age": 30,
  "roles": [
    "dev",
    "admin"
  ]
}</pre>

    <h2>Tips</h2>
    <ul>
        <li>If the JSON is invalid, the formatter will indicate the error location. Fix the error and re-run.</li>
        <li>Use the <a href="<?php echo $base_url; ?>json-viewer">JSON Viewer</a> for large nested payloads.</li>
        <li>Compare two JSON outputs with <a href="<?php echo $base_url; ?>text-comparison">Text Compare</a>.</li>
    </ul>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
