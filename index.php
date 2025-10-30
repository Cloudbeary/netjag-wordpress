<?php
/**
 * Railway Entry Point
 * Redirects to WordPress in public_html directory
 */

// Check if we're accessing the root and redirect to public_html
$request_uri = $_SERVER['REQUEST_URI'] ?? '/';

// If accessing root, load WordPress from public_html
if ($request_uri === '/' || $request_uri === '') {
    require_once __DIR__ . '/public_html/index.php';
    exit;
}

// For other requests, try to serve from public_html
$file_path = __DIR__ . '/public_html' . $request_uri;

// If it's a PHP file, include it
if (file_exists($file_path) && pathinfo($file_path, PATHINFO_EXTENSION) === 'php') {
    require_once $file_path;
    exit;
}

// If it's a static file, serve it
if (file_exists($file_path) && is_file($file_path)) {
    $mime_type = mime_content_type($file_path);
    header('Content-Type: ' . $mime_type);
    readfile($file_path);
    exit;
}

// If nothing found, load WordPress to handle the request
require_once __DIR__ . '/public_html/index.php';