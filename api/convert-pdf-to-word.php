<?php
/**
 * PDF to Word Conversion API
 * Uses ConvertAPI (Cloud API) for high-fidelity conversion.
 * 
 * IMPORTANT SETUP:
 * 1. Go to https://www.convertapi.com/
 * 2. Create a free account.
 * 3. Go to your dashboard and copy your "API Secret".
 * 4. Paste it securely into the $apiSecret variable below.
 */

$apiSecret = getenv('CONVERTAPI_SECRET') ?: '3AxumLNq9MGIgsdLYLAb1gNcvZirrSBX';

header('Content-Type: application/json');

// Relax error reporting so Hostinger doesn't crash on notices
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0); // Hide raw errors, output JSON only

// Allow the script to run longer for heavy PDF conversions
set_time_limit(180);

// Basic JSON exception handler only
set_exception_handler(function($e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Exception: ' . $e->getMessage()
    ]);
    exit;
});

try {
// Check if API Secret is configured
if (empty($apiSecret) || $apiSecret === "YOUR_CONVERTAPI_SECRET_HERE") {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'API Secret not configured. Please open api/convert-pdf-to-word.php and add your ConvertAPI Secret.'
    ]);
    exit;
}

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Check if file was uploaded
if (!isset($_FILES['pdfFile']) || $_FILES['pdfFile']['error'] !== UPLOAD_ERR_OK) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'No PDF file uploaded or upload error']);
    exit;
}

$uploadedFile = $_FILES['pdfFile'];

// Validate file type
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeType = finfo_file($finfo, $uploadedFile['tmp_name']);
finfo_close($finfo);

if ($mimeType !== 'application/pdf') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid file type. Only PDF files are allowed.']);
    exit;
}

// Check if CURL is enabled
if (!function_exists('curl_init')) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'CURL extension is not enabled. Please enable extension=curl in your php.ini']);
    exit;
}

// Prepare CURL request to ConvertAPI
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://v2.convertapi.com/convert/pdf/to/docx?Secret=' . $apiSecret . '&StoreFile=true');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 120); // 2 minute timeout
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Expect:']); // Prevent Expect: 100-continue issues on Hostinger

// Prevent SSL certificate issues on localhost/XAMPP
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_POST, 1);

// Send the uploaded temp file directly
$post = [
    'File' => new CURLFile($uploadedFile['tmp_name'], 'application/pdf', $uploadedFile['name'])
];
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// Execute request
$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'CURL Error: ' . $curlError]);
    exit;
}

// Decode API response
$responseObj = json_decode($result, true);

if ($httpCode !== 200) {
    // API returned an error
    $errorMsg = isset($responseObj['Message']) ? $responseObj['Message'] : 'API Error ' . $httpCode;
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'ConvertAPI Error: ' . $errorMsg]);
    exit;
}

// Success! Return the Download URL directly to the frontend.
if (isset($responseObj['Files']) && count($responseObj['Files']) > 0) {
    if (isset($responseObj['Files'][0]['Url'])) {
        $fileUrl = $responseObj['Files'][0]['Url']; 
        
        echo json_encode([
            'success' => true,
            'message' => 'Conversion successful',
            'downloadUrl' => $fileUrl,
            'previewText' => 'Document successfully converted via Cloud. Click download to view.'
        ]);
        exit;
    } else if (isset($responseObj['Files'][0]['FileData'])) {
        $fileData = $responseObj['Files'][0]['FileData']; 
        
        echo json_encode([
            'success' => true,
            'message' => 'Conversion successful',
            'data' => $fileData,
            'mimeType' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'previewText' => 'Preview generated from ConvertAPI'
        ]);
        exit;
    }
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Invalid response from ConvertAPI']);
    exit;
}

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Exception caught: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine()
    ]);
    exit;
}

