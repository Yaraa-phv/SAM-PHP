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
    <link rel="stylesheet" href="style.css">
    <style>
        .present {
            background-color: #d4edda !important;
            /* Light green */
        }

        .absent {
            background-color: #f8d7da !important;
            /* Light red */
        }

        .form-select.present {
            background-color: #d4edda !important;
            /* Light green */
            color: #155724;
            
        }

        .form-select.absent {
            background-color: #f8d7da !important;
            /* Light red */
            color: #721c24;
            
        }
    </style>
</head>

<body>

    <div class="container">
        <?php include 'navbar.php'; ?>
        <h2 class="mb-4">Check Attendance</h2>
        <form method="post">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php while ($row = $students->fetch_assoc()): ?>
        <tr class="align-middle ">
            <td><?= htmlspecialchars($row['student_id']) ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td>
                <select name="attendance[<?= $row['student_id'] ?>]" class="form-select present" aria-label="Attendance status for <?= htmlspecialchars($row['name']) ?>">
                    <option value="Present" selected>Present</option>
                    <option value="Absent">Absent</option>
                </select>
            </td>
        </tr>
    <?php endwhile; ?>
</tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-primary mb-5">Submit Attendance</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const selects = document.querySelectorAll('.form-select');

        function updateSelectColor(select) {
            select.classList.remove('present', 'absent');

            if (select.value === 'Present') {
                select.classList.add('present');
            } else if (select.value === 'Absent') {
                select.classList.add('absent');
            }
        }

        selects.forEach(select => {
            select.addEventListener('change', () => updateSelectColor(select));
            updateSelectColor(select); // Set initial color
        });
    });
</script>
</body>

</html>