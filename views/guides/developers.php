<?php
$page_title = 'Developer Guides - WordsCompare';
$page_description = 'Developer-focused how-to guides for formatting, comparing and decoding common developer data formats.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <header>
        <h1 class="display-5">Developer Guides</h1>
        <p class="lead">Short, practical tutorials for developers using WordsCompare utilities.</p>
    </header>

    <section class="mt-4">
        <ul>
            <li><a href="<?php echo $base_url; ?>guides/format-json-online">How to Format JSON Online</a></li>
            <li><a href="<?php echo $base_url; ?>guides/compare-json-objects">How to Compare Two JSON Objects</a></li>
            <li><a href="<?php echo $base_url; ?>guides/decode-jwt-token">How to Decode a JWT Token</a></li>
            <li><a href="<?php echo $base_url; ?>guides/base64-vs-encryption">Base64 Encoding vs Encryption</a></li>
            <li><a href="<?php echo $base_url; ?>guides/validate-json">How to Validate JSON</a></li>
        </ul>
    </section>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
