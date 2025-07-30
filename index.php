<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Attendance Management System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <button class="toggle-mode-btn" id="toggleModeBtn" title="Toggle Dark/Light Mode" data-bs-toggle="tooltip" data-bs-placement="left">
    <i class="bi bi-moon"></i>
  </button>
  <div class="container">
    <?php include 'navbar.php'; ?>
    <div class="hero-section row">
      <div class="text col-6">
        <h1>Welcome to Student Attendance Management System</h1>
        <p class="mb-0">Easily manage attendance, permissions, and view insightful reports.<br>Use the navigation above to get started.</p>
      </div>
      <div class="pic col-6">
        <img src="img/Picture.png" alt="" class="w-100 h-100">
      </div>

    </div>
    <!-- Features Section -->
    <div class="row justify-content-center mt-5">
      <div class="col-lg">
        <h2 class="mb-4 text-primary fw-bold text-center">Key Features</h2>
        <div class="row g-4">
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="feature-card text-center p-4 h-100">
              <div class="mb-3">
                <span class="fs-1 text-primary"><i class="bi bi-calendar-check"></i></span>
              </div>
              <h5 class="fw-semibold">Attendance Tracking</h5>
              <p class="text-muted">Record and monitor student attendance efficiently with real-time updates.</p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="feature-card text-center p-4 h-100">
              <div class="mb-3">
                <span class="fs-1 text-success"><i class="bi bi-person-check"></i></span>
              </div>
              <h5 class="fw-semibold">Permission Management</h5>
              <p class="text-muted">Easily manage student permissions and leave requests in one place.</p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="feature-card text-center p-4 h-100">
              <div class="mb-3">
                <span class="fs-1 text-warning"><i class="bi bi-bar-chart-line"></i></span>
              </div>
              <h5 class="fw-semibold">Performance Reports</h5>
              <p class="text-muted">View insightful attendance performance analytics and reports.</p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-lg-3">
            <div class="feature-card text-center p-4 h-100">
              <div class="mb-3">
                <span class="fs-1 text-danger"><i class="bi bi-search"></i></span>
              </div>
              <h5 class="fw-semibold">Student Search</h5>
              <p class="text-muted">Quickly search for student records and attendance history.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    &copy; <?php echo date('Y'); ?> SAM-PHP &mdash; Student Attendance Management System. Designed for modern education.
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle black/white mode
    const btn = document.getElementById('toggleModeBtn');
    btn.onclick = function() {
      document.body.classList.toggle('dark-mode');
      btn.innerHTML = document.body.classList.contains('dark-mode') ?
        '<i class="bi bi-brightness-high"></i>' :
        '<i class="bi bi-moon"></i>';
    };
    // Enable Bootstrap tooltip for toggle button
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  </script>
</body>

</html>