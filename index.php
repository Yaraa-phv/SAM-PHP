<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">SAM-PHP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="attendance.php">Check Attendance</a></li>
        <li class="nav-item"><a class="nav-link" href="permissions.php">Permissions</a></li>
        <li class="nav-item"><a class="nav-link" href="performance.php">Attendance Performance</a></li>
        <li class="nav-item"><a class="nav-link" href="search.php">Search Student</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <h1 class="mb-4">Welcome to Student Attendance Management System</h1>
  <p>Use the navigation above to manage attendance, permissions, and view reports.</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>