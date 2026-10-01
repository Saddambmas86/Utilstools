<?php
$page_title = 'How to Generate Test Data';
$page_description = 'Quick techniques to generate simple test data (strings, identifiers) using WordsCompare utilities.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <h1>How to Generate Test Data</h1>
    <p>Problem: Create simple test inputs like case variations, slugs, and encoded strings for QA scenarios.</p>

    <h2>Examples</h2>
    <ul>
        <li>Use <a href="<?php echo $base_url; ?>case-converter">Case Converter</a> to produce snake_case or camelCase identifiers.</li>
        <li>Use <a href="<?php echo $base_url; ?>text-to-slug">Text to Slug</a> for URL-friendly strings.</li>
        <li>Use <a href="<?php echo $base_url; ?>base64-encoder">Base64 Encoder</a> to create encoded payload fragments.</li>
    </ul>

    <h3>Practical flow</h3>
    <ol>
        <li>Start with realistic names: <code>John Doe</code>.</li>
        <li>Convert to different cases and slugs for form testing.</li>
        <li>Combine with encoded values where needed for headers or tokens.</li>
    </ol>

    <h2>Related tools</h2>
    <ul>
        <li><a href="<?php echo $base_url; ?>case-converter">Case Converter</a></li>
        <li><a href="<?php echo $base_url; ?>text-to-slug">Text to Slug</a></li>
        <li><a href="<?php echo $base_url; ?>base64-encoder">Base64 Encoder</a></li>
    </ul>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
