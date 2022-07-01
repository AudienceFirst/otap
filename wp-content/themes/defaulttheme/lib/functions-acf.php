<?php 

/**
 * Load the Zuid code library:
 * - /field_groups/home.php
 * - /field_groups/detail.php
 * - /field_groups/archive.php
 * - /field_groups/single.php
 * - /field_groups/page.php
 * - /field_groups/options.php
 */
array_map(function ($file) {
	$file = "field_groups/{$file}.php";
	require_once $file;
}, ['headers', 'detail', 'single', 'page', 'options', 'sidebar']);
