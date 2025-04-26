
<?php
// No HTML inside PHP tags unless necessary
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            overflow-y: auto;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }
        input, select, button, textarea {
            width: 95%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            font-size: 18px;
            transition:  0.3s;
        }
        button:hover {
            background-color: #218838;
        }
        select {
            background-color: #fff;
            cursor: pointer;
        }
        textarea {
            resize: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Patient Registration</h2>
        <form id="registrationForm">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="nic">NIC</label>
            <input type="text" id="nic" name="nic" required pattern="[0-9VvXx]{10,12}" title="Enter a valid NIC (old: 9 digits + V/X, new: 12 digits)">

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}" title="Enter a valid 10-digit phone number">

            <label for="address">Address</label>
            <textarea id="address" name="address" rows="4" placeholder="Enter your home address here..." required></textarea>

            <label for="city">City</label>
            <input type="text" id="city" name="city" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" required>

            <label for="blood_group">Blood Group</label>
            <select id="blood_group" name="blood_group" required>
                <option value="">Select</option>
                <option value="not sure">Not Sure</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>

            <label for="weight">Weight (kg)</label>
            <input type="number" id="weight" name="weight" placeholder="Enter weight in kg" min="1" required>

            <label for="height">Height (cm)</label>
            <input type="number" id="height" name="height" placeholder="Enter height in cm" min="1" required>

            <label for="issue">Describe Your Issue</label>
       <textarea id="issue" name="issue" rows="4" placeholder="Enter your health issue here..." required></textarea>

            <button type="submit">Register</button>
        </form>
    </div>
    <script>
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("/medinet-backend/patientreg.php", {
    method: "POST",
    body: formData
})

        .then(response => {
            if (!response.ok) {
                throw new Error("Server error: " + response.status);
            }
            return response.text();
        })
        .then(data => {
            if (data.trim() === "success") {
                alert("Registration Successful!");
                document.getElementById("registrationForm").reset();
            } else {
                alert("Error: " + data);
            }
        })
        .catch(error => console.error("Fetch Error:", error));
    });

    // Restrict name input to letters, spaces, Sinhala, and Tamil letters
    document.getElementById("name").addEventListener("input", function () {
        this.value = this.value.replace(/[^A-Za-z\u0D80-\u0DFF\u0B80-\u0BFF\s]/g, "");
    });
</script>

</body>
</html>

