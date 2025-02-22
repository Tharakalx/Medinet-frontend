<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard - MediNet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 20px;
            position: fixed;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .sidebar a:hover {
            background: #495057;
            border-radius: 5px;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>MediNet</h3>
        <a href="#">Dashboard</a>
        <a href="#">Appointments</a>
        <a href="#">Patients</a>
        <a href="#">Prescriptions</a>
        <a href="#">Settings</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Doctor Dashboard</h2>
        <p>Welcome, Dr. [Your Name]!</p>

        <!-- Appointments Section -->
        <div class="card mt-3">
            <div class="card-header">
                Upcoming Appointments
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="appointment-list">
                        <!-- Data will be inserted dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Sample appointment data (Replace this with data from the backend)
        let appointments = [
            { name: "John Doe", time: "10:00 AM", status: "Pending" },
            { name: "Jane Smith", time: "10:30 AM", status: "Pending" },
            { name: "Mark Wilson", time: "11:00 AM", status: "Completed" }
        ];

        function loadAppointments() {
            let table = document.getElementById("appointment-list");
            table.innerHTML = ""; // Clear existing data

            appointments.forEach((app, index) => {
                let row = `
                    <tr>
                        <td>${app.name}</td>
                        <td>${app.time}</td>
                        <td>${app.status}</td>
                        <td>
                            <button class="btn btn-success btn-sm" onclick="markCompleted(${index})">Complete</button>
                        </td>
                    </tr>
                `;
                table.innerHTML += row;
            });
        }

        function markCompleted(index) {
            appointments[index].status = "Completed";
            loadAppointments();
        }

        // Load appointments on page load
        window.onload = loadAppointments;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
