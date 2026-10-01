<?php
$page_title = 'QA Guides - WordsCompare';
$page_description = 'QA and testing walkthroughs for comparing responses, validating JSON and JWT authentication.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <header>
        <h1 class="display-5">QA Guides</h1>
        <p class="lead">Practical QA guidance using WordsCompare tools for verification and comparison tasks.</p>
    </header>

    <section class="mt-4">
        <ul>
            <li><a href="<?php echo $base_url; ?>guides/compare-api-responses">How to Compare API Responses</a></li>
            <li><a href="<?php echo $base_url; ?>guides/validate-json-api-responses">How to Validate JSON API Responses</a></li>
            <li><a href="<?php echo $base_url; ?>guides/generate-test-data">How to Generate Test Data</a></li>
            <li><a href="<?php echo $base_url; ?>guides/test-jwt-authentication">How to Test JWT Authentication</a></li>
            <li><a href="<?php echo $base_url; ?>guides/http-status-codes-api-testing">HTTP Status Codes Used in API Testing</a></li>
        </ul>
    </section>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
