<?php
require_once 'config.php';
// Fetch students
$students = $conn->query("SELECT * FROM students ORDER BY student_id");
// Handle attendance submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = date('Y-m-d');
    foreach ($_POST['attendance'] as $student_id => $status) {
        $conn->query("REPLACE INTO attendance (student_id, date, status) VALUES ('$student_id', '$date', '$status')");
    }
    echo '<div class="alert alert-success">Attendance recorded for today.</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <h2 class="mb-4">Check Attendance</h2>
    <form method="post">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $students->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['student_id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td>
                        <select name="attendance[<?= $row['student_id'] ?>]" class="form-select">
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Submit Attendance</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>