<?php
$page_title = 'Base64 Encoding vs Encryption';
$page_description = 'Explains the difference between Base64 encoding and encryption with examples and when to use each.';
$page_keywords = 'base64,encoding,encryption,security';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <h1>Base64 Encoding vs Encryption</h1>
    <p>Problem: Understand whether Base64 makes data secure and when to use proper encryption.</p>

    <h2>What is Base64?</h2>
    <p>Base64 is an encoding scheme that represents binary data as ASCII characters. It is reversible and not secure.</p>

    <h2>What is Encryption?</h2>
    <p>Encryption transforms data using a key so it cannot be read without the key. Proper encryption provides confidentiality.</p>

    <h3>Example</h3>
    <p>Original: <code>secret-password</code></p>
    <p>Base64 encoded: <code><?php echo base64_encode('secret-password'); ?></code></p>

    <h3>Why Base64 is not encryption</h3>
    <ul>
        <li>Anyone can decode Base64 back to the original text.</li>
        <li>Use encryption (e.g., AES) when you need confidentiality.</li>
    </ul>

    <h2>Tools</h2>
    <ul>
        <li><a href="<?php echo $base_url; ?>base64-encoder">Base64 Encoder</a> — encode/decode for debugging.</li>
        <li>For real encryption use appropriate cryptographic libraries on the server/client side.</li>
    </ul>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
