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
                    <th>ID</th>
                    <th>Phone Number</th>
                    <th>MBBS</th>
                    <th>Email</th>
                    <th>License Number</th>
                    <th>Hospital</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example static doctor data -->
                <tr>
                    <td>Dr. John Doe</td>
                    <td>12345</td>
                    <td>+123456789</td>
                    <td>MBBS</td>
                    <td>johndoe@example.com</td>
                    <td>ABC12345</td>
                    <td>General Hospital</td>
                </tr>
                <tr>
                    <td>Dr. Jane Smith</td>
                    <td>67890</td>
                    <td>+987654321</td>
                    <td>MBBS</td>
                    <td>janesmith@example.com</td>
                    <td>XYZ98765</td>
                    <td>City Medical Center</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </main>
</div>

<script>
    const menuBtn = document.getElementById("menu");
    const sidebar = document.querySelector(".sidebar");

    menuBtn.onclick = function () {
        sidebar.classList.toggle("active"); 
    }
</script>

<?php include '../includes/footer.php'; ?>

</body>
</html>
