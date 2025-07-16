<?php
require_once 'config.php';
// Fetch permissions
$permissions = $conn->query("SELECT p.*, s.name FROM permissions p JOIN students s ON p.student_id = s.student_id ORDER BY p.date DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Permissions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <h2 class="mb-4">Student Permission Requests</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Reason</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $permissions->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['student_id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['date']) ?></td>
                <td><?= htmlspecialchars($row['reason']) ?></td>
                <td><span class="badge bg-<?= $row['status'] === 'Approved' ? 'success' : ($row['status'] === 'Rejected' ? 'danger' : 'warning') ?>"><?= htmlspecialchars($row['status']) ?></span></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>