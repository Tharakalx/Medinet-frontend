<?php
// After verifying admin credentials...

$adminName = "Sachithra_dinendra"; // replace this from database value!

// Set cookie (expires in 30 days)
setcookie("adminName", $adminName, time() + (86400 * 30), "/");

// Redirect to dashboard
header("Location:http://localhost/medinet/Medinet-frontend/pages/cookies.phpadmin_dashboard.php");
exit();
?>

