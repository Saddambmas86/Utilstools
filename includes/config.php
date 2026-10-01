<?php
// config.php
$site_name = "WordsCompare";
$default_title_suffix = "Free PDF, Calculator & Text Tools"; // For homepage

// BASE URL ---------------------------------------
//$base_url = "http://localhost/mywebtools1.0.2/"; // Optional for absolute paths
// Detect protocol (http/https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
// Get domain (e.g., localhost or example.com)
$domain = $_SERVER['HTTP_HOST'];
// Get the correct base path (project root, not current file location)
$script_path = str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', dirname(__DIR__)));
$base_path = rtrim($script_path, '/') . '/';
// Prefer HTTPS canonical when site is served over HTTPS. Do not rewrite incoming request here.
$base_url = $protocol . $domain . $base_path;

// Optional: force canonical protocol to https for meta tags only (set to true if site has valid SSL)
if (!defined('FORCE_CANONICAL_HTTPS')) define('FORCE_CANONICAL_HTTPS', true);

// Canonical base used for meta tags (respects FORCE_CANONICAL_HTTPS)
$canonical_protocol = (FORCE_CANONICAL_HTTPS ? 'https://' : $protocol);
$canonical_base_url = $canonical_protocol . $domain . $base_path;
// expose to templates
$GLOBALS['base_url'] = $base_url;
$GLOBALS['canonical_base_url'] = $canonical_base_url;
// Default brand icons array (used to pick 'fab' prefix). Keep empty if none.
if (!isset($brandIcons) || !is_array($brandIcons)) {
	$brandIcons = [];
}
$GLOBALS['brandIcons'] = $brandIcons;
?>