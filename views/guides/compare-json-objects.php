<?php
$page_title = 'How to Compare Two JSON Objects';
$page_description = 'Compare two JSON objects to find structural or value differences using WordsCompare tools.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <h1>How to Compare Two JSON Objects</h1>
    <p>Problem: You need to detect differences between two API responses or JSON files.</p>

    <h2>Steps</h2>
    <ol>
        <li>Open <a href="<?php echo $base_url; ?>text-comparison">Text Compare</a> or use the <a href="<?php echo $base_url; ?>json-viewer">JSON Viewer</a> for structured comparison.</li>
        <li>Paste JSON A into the left pane and JSON B into the right pane.</li>
        <li>Run the comparison to highlight added, removed, or changed lines.</li>
    </ol>

    <h3>Example inputs</h3>
    <pre>// JSON A
{"id":1,"name":"Alice","active":true}

// JSON B
{"id":1,"name":"Alice Smith","active":true}
</pre>

    <h3>Expected result</h3>
    <p>The comparison will show that the <code>name</code> field changed.</p>

    <h2>Notes</h2>
    <ul>
        <li>For deep structural diffs, prettify both JSON inputs first with <a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a>.</li>
        <li>Use <a href="<?php echo $base_url; ?>json-viewer">JSON Viewer</a> to inspect nested differences.</li>
    </ul>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
