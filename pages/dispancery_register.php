<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dispensary Registration</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { max-width: 500px; margin: auto; }
        input, select { width: 100%; padding: 8px; margin: 10px 0; }
        button { padding: 10px 20px; background-color: #28a745; color: white; border: none; }
    </style>
</head>
<body>

<h2>Dispensary Registration</h2>

<form action="../../Medinet-backend/dispencary_registration.php" method="POST">
    <input type="text" name="name" placeholder="Dispensary Name" required>
    <input type="text" name="building_no" placeholder="Building Number" required>
    <input type="text" name="street" placeholder="Street" required>
    <input type="text" name="city" placeholder="City" required>
    <input type="text" name="district" placeholder="District" required>
    <input type="text" name="zip" placeholder="ZIP Code" required>
    <input type="text" name="contact_number" placeholder="Contact Number" required>
    <input type="time" name="open_time" required>
    <input type="time" name="close_time" required>
    <button type="submit">Register Dispensary</button>
</form>

</body>
</html>
