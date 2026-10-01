<?php
$page_title = 'Guides - WordsCompare';
$page_description = 'Practical guides for developers and QA engineers: formatting, testing, and API troubleshooting using free browser tools.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <header>
        <h1 class="display-5">Guides</h1>
        <p class="lead">Concise, practical walkthroughs for developers and QA engineers using WordsCompare tools.</p>
    </header>

    <section class="mt-4">
        <h2 class="h5">For Developers</h2>
        <ul>
            <li><a href="<?php echo $base_url; ?>guides/developers">Developer guides index</a></li>
        </ul>
    </section>

    <section class="mt-3">
        <h2 class="h5">For QA & API Testing</h2>
        <ul>
            <li><a href="<?php echo $base_url; ?>guides/qa">QA guides index</a></li>
            <li><a href="<?php echo $base_url; ?>guides/api-testing">API testing guides</a></li>
        </ul>
    </section>

    <section class="mt-3">
        <h2 class="h5">DevOps</h2>
        <ul>
            <li><a href="<?php echo $base_url; ?>guides/devops">DevOps guides</a></li>
        </ul>
    </section>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
