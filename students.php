<?php
require_once 'config.php';
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $conn->real_escape_string($_POST['student_id']);
    $name = $conn->real_escape_string($_POST['name']);
    if ($conn->query("INSERT INTO students (student_id, name) VALUES ('$student_id', '$name')")) {
        $msg = '<div class="alert alert-success">Student added successfully.</div>';
    } else {
        $msg = '<div class="alert alert-danger">Error: ' . $conn->error . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <h2 class="mb-4">Add New Student</h2>
    <?= $msg ?>
    <form method="post" class="row g-3">
        <div class="col-md-4">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" name="student_id" id="student_id" class="form-control" required placeholder="e.g., STU001">
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="col-md-2 align-self-end">
            <button type="submit" class="btn btn-success">Add Student</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>