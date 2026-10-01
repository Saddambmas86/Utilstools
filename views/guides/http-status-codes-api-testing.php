<?php
$page_title = 'HTTP Status Codes Used in API Testing';
$page_description = 'Common HTTP status codes and what they mean for API testing and validation.';
include_once __DIR__ . '/../../includes/header.php';
?>
<main class="container py-5">
    <h1>HTTP Status Codes Used in API Testing</h1>
    <p>Problem: Quickly interpret HTTP responses when testing APIs.</p>

    <h2>Common codes</h2>
    <dl>
        <dt>200 OK</dt>
        <dd>Successful request; inspect body for expected data.</dd>
        <dt>201 Created</dt>
        <dd>Resource created; check Location header and response body.</dd>
        <dt>400 Bad Request</dt>
        <dd>Client-side validation issue — check payload and parameters.</dd>
        <dt>401 Unauthorized</dt>
        <dd>Authentication required or token invalid/expired.</dd>
        <dt>403 Forbidden</dt>
        <dd>Authenticated but not authorized to perform the action.</dd>
        <dt>404 Not Found</dt>
        <dd>Resource does not exist or wrong URL.</dd>
        <dt>500 Internal Server Error</dt>
        <dd>Server-side error — collect logs and request details for debugging.</dd>
    </dl>

    <h2>Practical tips</h2>
    <ul>
        <li>When seeing <code>401</code>, decode the JWT to inspect expiry or scopes using <a href="<?php echo $base_url; ?>jwt-decoder">JWT Decoder</a>.</li>
        <li>For <code>400</code>, validate JSON with <a href="<?php echo $base_url; ?>json-formatter">JSON Formatter</a>.</li>
    </ul>
</main>

<?php include_once __DIR__ . '/../../includes/footer.php'; ?>
