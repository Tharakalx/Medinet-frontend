<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pharmacist Registration</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 500px; margin: auto; }
        input, select { width: 100%; padding: 8px; margin: 10px 0; }
        button { padding: 10px 20px; background-color: #28a745; color: white; border: none; }
    </style>
</head>
<body>

<h2>Pharmacist Registration</h2>

<form action="../../Medinet-backend/pharmacist_registration.php" method="POST">
    <input type="text" name="name" placeholder="Pharmacist Name" required>
    <input type="text" name="phone_number" placeholder="Contact Number" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register Pharmacist</button>
</form>

</body>
</html>