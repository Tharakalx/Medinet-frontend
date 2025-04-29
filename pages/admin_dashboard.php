<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../admin_styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
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
                <p class= "count"   id="total_dispensaries">...</p>

                <p>Total Dispensary</p>
            </div>
            <div class="card">
                <h3>Patients</h3>
                <p class="count" id="total_Patients">...</p>
                <p>Total Patients</p>
            </div>
            <div class="card">
                <h3>Doctors</h3>
                <p class="count" id="total_Doctors">...</p>
                <p>Total Doctors</p>
            </div>
            <div class="card">
                <h3>Appointments</h3>
                <p class="count" id="total_Appointments">...</p>
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
    fetch("http://localhost/medinet/Medinet-backend/admin_dashboard_backend.php?type=countdispensaries")
    .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                document.getElementById('total_dispensaries').textContent = data[0].total_dispensaries;
            }
            
        })
        .catch(error => console.error('Error fetching dispensary count:', error));
});

document.addEventListener("DOMContentLoaded", function() {
    fetch("http://localhost/medinet/Medinet-backend/admin_dashboard_backend.php?type=countdiPatients")
    .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                document.getElementById('total_Patients').textContent = data[0].total_Patients;
            }
            
        })
        .catch(error => console.error('Error fetching dispensary count:', error));
});

document.addEventListener("DOMContentLoaded", function() {
    fetch("http://localhost/medinet/Medinet-backend/admin_dashboard_backend.php?type=countdiDoctors")
    .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                document.getElementById('total_Doctors').textContent = data[0].total_Doctors;
            }
            
        })
        .catch(error => console.error('Error fetching dispensary count:', error));
});
document.addEventListener("DOMContentLoaded", function() {
    fetch("http://localhost/medinet/Medinet-backend/admin_dashboard_backend.php?type=countdiAppointments")
    .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                document.getElementById('total_Appointments').textContent = data[0].total_Appointments;
            }
            
        })
        .catch(error => console.error('Error fetching dispensary count:', error));
});
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('appointmentsChart').getContext('2d');

    fetch('http://localhost/medinet/Medinet-backend/admin_dashboard_backend.php?type=appointmentslast14days')
        .then(response => response.json())
        .then(data => {
            const last14Days = [];
            const appointmentCounts = [];

            // Prepare date list for last 14 days
            for (let i = 13; i >= 0; i--) {
                let date = new Date();
                date.setDate(date.getDate() - i);
                last14Days.push(date.toISOString().split('T')[0]); // YYYY-MM-DD
            }

            // Initialize all counts as 0
            let countsMap = {};
            last14Days.forEach(date => {
                countsMap[date] = 0;
            });

            // Fill counts from database
            data.forEach(item => {
                countsMap[item.appointment_day] = item.count;
            });

            const chartLabels = [];
            const chartData = [];

            last14Days.forEach(date => {
                // Format for display (like 'Apr 28')
                const formattedDate = new Date(date).toLocaleDateString("en-US", { month: "short", day: "numeric" });
                chartLabels.push(formattedDate);
                chartData.push(countsMap[date]);
            });

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Appointments in Last 14 Days',
                        data: chartData,
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
        })
        .catch(error => console.error('Error fetching last 14 days appointments:', error));
});

</script>

<?php include '../includes/footer.php'; ?>
</body>
</html>
