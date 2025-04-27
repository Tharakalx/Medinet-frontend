<?php
$dispensary_id = $_GET['dispensary_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Registration</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 500px; margin: auto; }
        input { width: 100%; padding: 8px; margin: 10px 0; }
        button { padding: 10px 20px; background-color: #007bff; color: white; border: none; }
    </style>
</head>
<body>

<h2>Doctor Registration</h2>

<!-- <form action="../../Medinet-backend/doctor_registration.php" method="POST">
    <input type="hidden" name="dispensary_id" value="<?php echo $dispensary_id; ?>">
    <input type="text" name="name" placeholder="Doctor Name" required>
    <input type="text" name="nic_no" placeholder="NIC Number" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="text" name="phone_number" placeholder="Phone Number" required>
    <input type="text" name="hospital" placeholder="Hospital Name" required>
    <button type="submit">Register Doctor</button>
</form> -->
<form action="http://localhost/Medinet-backend/doctor_registration.php" method="POST">
    <input type="text" name="name" placeholder="Doctor Name" required>
    <input type="text" name="nic_no" placeholder="NIC Number" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="text" name="phone_number" placeholder="Phone Number" required>
    <input type="text" name="hospital" placeholder="Hospital Name" required>
    <input type="hidden" name="dispensary_id" value="..."> <!-- Pass the dispensary ID -->
    <button type="submit">Register Doctor</button>
</form>


</body>
</html>
