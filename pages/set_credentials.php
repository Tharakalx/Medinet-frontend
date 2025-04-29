<?php
$nic_no = $_GET['nic_no'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Set Username & Password</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        form { max-width: 400px; margin: auto; }
        input { width: 100%; padding: 8px; margin: 10px 0; }
        button { padding: 10px 20px; background-color: #17a2b8; color: white; border: none; }
    </style>
</head>
<body>

<h2>Set Your Username & Password</h2>

<form action="../../Medinet-backend/credentials_backend.php?" method="POST">
    <input type="hidden" name="nic_no" value="<?php echo $nic_no; ?>">
    <input type="text" name="username" placeholder="Choose Username" required>
    <input type="password" name="password" placeholder="Choose Password" required>
    <button type="submit">Save Credentials</button>
</form>

</body>
</html>
