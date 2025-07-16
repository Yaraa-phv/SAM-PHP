<?php
require_once 'config.php';
$results = null;
if (isset($_GET['q'])) {
    $q = $conn->real_escape_string($_GET['q']);
    $results = $conn->query("SELECT * FROM students WHERE student_id LIKE '%$q%' OR name LIKE '%$q%' ORDER BY student_id");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <h2 class="mb-4">Search Student</h2>
    <form class="row mb-4" method="get">
        <div class="col-md-6">
            <input type="text" name="q" class="form-control" placeholder="Enter student name or ID (e.g., STU001)" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>" required>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <?php if ($results !== null): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($results->num_rows > 0): while ($row = $results->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['student_id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                </tr>
                <?php endwhile; else: ?>
                <tr><td colspan="2">No students found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>