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
        <h1>Patient Details</h1>
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for patient..." class="search-bar">

<!-- Patient Details Table -->
<table border="1">
    <thead>
        <tr>
            <th>Phone Number</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>City</th>
           
        </tr>
    </thead>
    <tbody id="PaientTableBody">
    </tbody>
</table>
        
    </main>
</div>

<script>

document.addEventListener("DOMContentLoaded", function () {
    fetchPaient();
});

function fetchPaient() {
    fetch("http://localhost/medinet/Medinet-backend/admin_dashboard_backend.php?type=patient")

        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById("PaientTableBody");
            tableBody.innerHTML = "";
            data.forEach(paient => {
                let row = `<tr>
                    <td>${paient.phone_number}</td>
                    <td>${paient.name}</td>
                    <td>${paient.age}</td>
                    <td>${paient.gender}</td>
                    <td>${paient.city}</td>
                   
                </tr>`;
                tableBody.innerHTML += row;
            });
        })
        .catch(error => console.error("Error fetching Paient:", error));
}

function searchTable() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let rows = document.querySelectorAll("#PaientTableBody tr");

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
