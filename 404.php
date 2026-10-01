<?php
http_response_code(404);
include 'includes/header.php';
?>
<main class="container py-5">
    <div class="text-center">
        <h1 class="display-5">404 — Page not found</h1>
        <p class="lead">The page you requested could not be found. Try returning to the <a href="<?php echo $base_url; ?>">homepage</a> or use the search.</p>
        <a href="<?php echo $base_url; ?>" class="btn btn-primary mt-3">Go Home</a>
    </div>
</main>
<?php include 'includes/footer.php'; ?>
