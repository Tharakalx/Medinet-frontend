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
        <h1>Dispensary Details</h1>
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for dispensaries..." class="search-bar">

<!-- Dispensary Details Table -->
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Address</th>
            <th>City</th>
            <th>License Number</th>
            <th>Contact Number</th>
            <th>Doctor ID</th>
            <th>Open Time</th>
            <th>Close Time</th>
        </tr>
    </thead>
    <tbody id="dispensariesTableBody">
    </tbody>
</table>

        
    </main>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    fetchdispensaries();
});

function fetchdispensaries() {
    fetch("http://localhost/medinet/Medinet-backend/admin_dashboard_backend.php?type=dispensaries")

        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById("dispensariesTableBody");
            tableBody.innerHTML = "";
            data.forEach(dispensaries => {
                let row = `<tr>
                    <td>${dispensaries.id}</td>
                    <td>${dispensaries.address}</td>
                    <td>${dispensaries.city}</td>
                    <td>${dispensaries.license_number}</td>
                    <td>${dispensaries.contact_number}</td>
                    <td>${dispensaries.doctor_id}</td>
                    <td>${dispensaries.open_time}</td>
                    <td>${dispensaries.close_time}</td>
                </tr>`;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error("Error fetching dispensaries:", error));
}
function searchTable() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let rows = document.querySelectorAll("#dispensariesTableBody tr");

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
