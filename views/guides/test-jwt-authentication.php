<?php
$page_title = 'How to Test JWT Authentication';
$page_description = 'Guide to inspect and validate JWT-based authentication flows during testing.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <h1>How to Test JWT Authentication</h1>
    <p>Problem: Verify tokens used by your API are formed correctly and contain expected claims.</p>

    <h2>Steps</h2>
    <ol>
        <li>Obtain a token from your auth endpoint (or a sample token).</li>
        <li>Open <a href="<?php echo $base_url; ?>jwt-decoder">JWT Decoder</a> and paste the token.</li>
        <li>Check the <code>exp</code> claim for expiry and expected scopes or roles.</li>
        <li>If the payload contains encoded fragments, use <a href="<?php echo $base_url; ?>base64-encoder">Base64 Encoder</a> to inspect them.</li>
    </ol>

    <h3>Checks to perform</h3>
    <ul>
        <li>Token header algorithm matches expected signature algorithm.</li>
        <li>Claims include <code>sub</code>, <code>iat</code>, and <code>exp</code> when required.</li>
        <li>Expiry is in the future during tests.</li>
    </ul>

    <h2>Related tools</h2>
    <ul>
        <li><a href="<?php echo $base_url; ?>jwt-decoder">JWT Decoder</a></li>
        <li><a href="<?php echo $base_url; ?>base64-encoder">Base64 Encoder</a></li>
    </ul>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
