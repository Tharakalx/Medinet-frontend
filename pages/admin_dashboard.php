<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../admin_styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js Library -->
</head>

<body>
<?php include 'admin_header.php'; ?>

<div class="container">
    <!-- Left Sidebar -->
    <?php include 'admin_sidebar.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
        <h1>Dashboard</h1>

        <div class="overview">
            <div class="card">
                <h3>Dispensary</h3>
                <p class="count">50</p>
                <p>Total Dispensary</p>
            </div>
            <div class="card">
                <h3>Patients</h3>
                <p class="count">120</p>
                <p>Total Patients</p>
            </div>
            <div class="card">
                <h3>Doctors</h3>
                <p class="count">15</p>
                <p>Total Doctors</p>
            </div>
            <div class="card">
                <h3>Appointments</h3>
                <p class="count">50</p>
                <p>Today’s Appointments</p>
            </div>
        </div>

        <!-- Chart Container -->
        <div class="chart-container">
            <canvas id="appointmentsChart"></canvas>
        </div>
    </main>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('appointmentsChart').getContext('2d');

        // Generate last 14 days
        const last14Days = [];
        const appointmentCounts = [];

        for (let i = 13; i >= 0; i--) {
            let date = new Date();
            date.setDate(date.getDate() - i);
            last14Days.push(date.toLocaleDateString("en-US", { month: "short", day: "numeric" }));

            // Dummy data - Replace with real data from PHP/MySQL
            appointmentCounts.push(Math.floor(Math.random() * 20) + 5);
        }

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: last14Days,
                datasets: [{
                    label: 'Appointments in Last 14 Days',
                    data: appointmentCounts,
                    backgroundColor: 'rgba(4, 118, 184, 0.7)',
                    borderColor: 'rgba(4, 118, 184, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<?php include '../includes/footer.php'; ?>
</body>
</html>
