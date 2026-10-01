<?php
$page_title = 'How to Decode a JWT Token';
$page_description = 'Inspect JWT headers and payloads safely using the JWT Decoder tool. Examples and interpretation.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <h1>How to Decode a JWT Token</h1>
    <p>Problem: You need to inspect a JSON Web Token to check claims, expiry and header values.</p>

    <h2>Steps</h2>
    <ol>
        <li>Open the <a href="<?php echo $base_url; ?>jwt-decoder">JWT Decoder</a> tool.</li>
        <li>Paste the token (three-part base64url string) into the input.</li>
        <li>Click <strong>Decode</strong> to view header and payload.</li>
    </ol>

    <h3>Example token (truncated)</h3>
    <pre>eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoiQWxpY2UifQ.SflKxwRJSMeKKF2QT4fwpMeJf36POk6yJV_adQssw5c</pre>

    <h3>Decoded output</h3>
    <pre>Header: {"alg":"HS256","typ":"JWT"}
Payload: {"name":"Alice"}</pre>

    <h2>Security note</h2>
    <p>Do not paste private keys or tokens with sensitive data into public tools. Use the decoder to inspect non-sensitive tokens or on a secure environment.</p>

    <h2>Related tools</h2>
    <ul>
        <li><a href="<?php echo $base_url; ?>base64-encoder">Base64 Encoder</a> — inspect base64url fragments.</li>
        <li><a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a> — prettify decoded payloads.</li>
    </ul>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
