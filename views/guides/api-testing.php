<?php
$page_title = 'API Testing Guides - WordsCompare';
$page_description = 'API testing guides focusing on payload comparison, authentication checks and common HTTP status codes.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <header>
        <h1 class="display-5">API Testing Guides</h1>
        <p class="lead">Guides targeted at API testers and QA engineers.</p>
    </header>

    <section class="mt-4">
        <ul>
            <li><a href="<?php echo $base_url; ?>guides/compare-api-responses">How to Compare API Responses</a></li>
            <li><a href="<?php echo $base_url; ?>guides/validate-json-api-responses">How to Validate JSON API Responses</a></li>
            <li><a href="<?php echo $base_url; ?>guides/test-jwt-authentication">How to Test JWT Authentication</a></li>
            <li><a href="<?php echo $base_url; ?>guides/http-status-codes-api-testing">HTTP Status Codes Used in API Testing</a></li>
        </ul>
    </section>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
