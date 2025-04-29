<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../admin_styles.css">
</head>

<body>
<?php include 'admin_header.php'; ?>
   
<div class="container">
    <!-- Left Sidebar -->
    <?php include 'admin_sidebar.php'; ?>
    <!-- Main Content -->
    <main class="main-content">
        <h1>Doctor Details</h1>
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for doctors..." class="search-bar">

        <!-- Doctor Details Table -->
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>User Name</th>
                    <th>ID</th>
                    <th>Phone Number</th>
                    <th>MBBS</th>
                    <th>License Number</th>
                    <th>Hospital</th>
                    <th>Dispensary ID</th>
                </tr>
            </thead>
            <tbody id="doctorTableBody">
            </tbody>
        </table>
    </main>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    fetchDoctors();
});

function fetchDoctors() {
    fetch("http://localhost/medinet/Medinet-backend/admin_dashboard_backend.php?type=doctor")

        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById("doctorTableBody");
            tableBody.innerHTML = "";
            data.forEach(doctor => {
                let row = `<tr>
                    <td>${doctor.name}</td>
                    <td>${doctor.username}</td>
                    <td>${doctor.id}</td>
                    <td>${doctor.phone_number}</td>
                    <td>${doctor.mbbs}</td>
                    <td>${doctor.license_number}</td>
                    <td>${doctor.hospital}</td>
                    <td>${doctor.dispensary_id}</td>
                </tr>`;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error("Error fetching doctors:", error));
}

function searchTable() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let rows = document.querySelectorAll("#doctorTableBody tr");

    rows.forEach(row => {
        let text = row.innerText.toLowerCase();
        if (text.includes(input)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}
const menuBtn = document.getElementById("menu");
    const sidebar = document.querySelector(".sidebar");

    menuBtn.onclick = function () {
        sidebar.classList.toggle("active"); 
    }
</script>

<?php include '../includes/footer.php'; ?>

</body>
</html>
