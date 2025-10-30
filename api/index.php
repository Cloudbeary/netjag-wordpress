<?php
/**
 * Vercel API endpoint for WordPress
 * This handles all WordPress requests through Vercel's serverless functions
 */

// Load WordPress configuration for Vercel
require_once __DIR__ . '/../wp-config-vercel.php';

// Set the correct path for WordPress
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/../public_html/index.php';

// Change to the WordPress directory
chdir(__DIR__ . '/../public_html');

// Load WordPress
require_once __DIR__ . '/../public_html/index.php';