<?php

$url = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path = parse_url($url, PHP_URL_PATH);
$lastSegment = basename($path);
$result = ucfirst(substr($lastSegment, 0, -4)); // Outputs: page
?>

<div class="d-flex justify-content-between">
  <h1 class="page-title pb-2"><?= $result ?></h1>
  <nav class="breadcrumb fs-6">
    <a class="breadcrumb-item nav-link" href="index.php">Home</a>
    <a class="breadcrumb-item nav-link" href="#">Pages</a>
    <span class="breadcrumb-item active" aria-current="page"><?= $result ?></span>
  </nav>
</div>