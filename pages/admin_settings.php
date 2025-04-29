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
        <h1>settings Details</h1>
        
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
