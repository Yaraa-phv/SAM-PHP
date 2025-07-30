<?php
require_once 'config.php';
$student = null;
$performance = null;
if (isset($_GET['student_id'])) {
    $student_id = $conn->real_escape_string($_GET['student_id']);
    $student = $conn->query("SELECT * FROM students WHERE student_id = '$student_id'")->fetch_assoc();
    $performance = $conn->query("SELECT status, COUNT(*) as count FROM attendance WHERE student_id = '$student_id' GROUP BY status");
}
$students = $conn->query("SELECT student_id, name FROM students ORDER BY student_id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Attendance Performance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <?php include 'navbar.php'; ?>
        <h2 class="mb-4">Attendance Performance</h2>
        <form class="row mb-4" method="get">
            <div class="col-md-6">
                <label for="student_id" class="form-label">Select Student</label>
                <select name="student_id" id="student_id" class="form-select" required>
                    <option value="">Choose...</option>
                    <?php while ($row = $students->fetch_assoc()): ?>
                        <option value="<?= $row['student_id'] ?>" <?= isset($student) && $student['student_id'] == $row['student_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($row['student_id']) ?> - <?= htmlspecialchars($row['name']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary">View</button>
            </div>
        </form>
        <?php if ($student): ?>
            <h4>Performance for <?= htmlspecialchars($student['name']) ?> (<?= htmlspecialchars($student['student_id']) ?>)</h4>
            <table class="table table-bordered w-50">
                <thead class="table-dark">
                    <tr>
                        <th>Status</th>
                        <th>Count</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $performance->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['status']) ?></td>
                            <td><?= $row['count'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php elseif (isset($_GET['student_id'])): ?>
            <div class="alert alert-warning">Student not found or no attendance records.</div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>