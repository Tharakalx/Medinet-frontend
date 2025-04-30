<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispensary Profile</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        /* Container for center alignment */
        .container {
            width: 100%;
            max-width: 900px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Header Styling */
        header {
            background-color:rgb(73, 100, 222);
            color: white;
            width: 100%;
            height:100px;
            padding: 30px 0;
            text-align: center;
            font-size: 24px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Footer Styling */
        footer {
            background-color: #333;
            color: white;
            width: 100%;
            text-align: center;
            padding: 10px;
            position:bottom;
            bottom: 0;
            font-size: 14px;
        }

        /* Profile Box Styling */
        .profile-box {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin-top: 30px;
        }

        /* Title Styling */
        .title {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
        }

        /* Detail Items Styling */
        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .detail-item strong {
            color: rgb(73, 100, 222);
            font-weight: bold;
        }

        .detail-item p {
            color: #555;
        }

        /* Input Fields Styling */
        .form-input {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        /* Button Styling */
        button {
            width: 100%;
            padding: 12px;
            background-color: rgb(73, 100, 222);
            color: white;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color:rgb(255, 0, 0);
        }

        /* Appointment Form Section */
        .appointment-form {
            width: 100%;
            max-width: 700px;
        }
    </style>
</head>
<body>

<header>
    Dispensary Management System
</header>

<div class="container">
    <!-- Profile Box for Dispensary Details -->
    <div class="profile-box">
        <h2 class="title">Dispensary Details</h2>

        <!-- Section to display the fetched details -->
        <div id="detailsSection"></div>
    </div>

    <!-- Profile Box for Adding Appointment -->
    <div class="profile-box">
        <h2 class="title">Add Appointment</h2>

        <!-- Appointment Form -->
        <form id="appointmentForm" class="appointment-form">
            <input type="hidden" id="dispensary_id" value="1">

            <div class="detail-item">
                <strong>Doctor ID:</strong>
                <input type="text" id="doctor_id" class="form-input" placeholder="Enter Doctor ID" required>
            </div>
            <div class="detail-item">
                <strong>Patient ID:</strong>
                <input type="text" id="patient_id" class="form-input" placeholder="Enter Patient ID" required>
            </div>
            <div class="detail-item">
                <strong>Patient Number:</strong>
                <input type="number" id="patient_number" class="form-input" placeholder="Enter Patient Number" required>
            </div>
            <div class="detail-item">
                <strong>Date:</strong>
                <input type="date" id="appointment_date" class="form-input" required>
            </div>
            <div class="detail-item">
                <strong>Time Slot:</strong>
                <input type="time" id="time_slot" class="form-input" required>
            </div>
            <div class="detail-item">
                <strong>Status:</strong>
                <select id="status" class="form-input" required>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                    <option value="Canceled">Canceled</option>
                </select>
            </div>

            <button type="submit">Add Appointment</button>
        </form>
    </div>
</div>

<!-- Footer Section -->
<footer>
    &copy; 2025 Dispensary Management System | All Rights Reserved
</footer>

<script>
    // Function to get query parameter from URL
    function getQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    const dispensary_id = getQueryParam('dispensary_id');

    if (dispensary_id) {
        fetch(`http://localhost/Medinet-backend/dispancery_profile.php?id=${dispensary_id}`)
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    document.getElementById('detailsSection').innerHTML = `<p>${data.message}</p>`;
                } else {
                    document.getElementById('detailsSection').innerHTML = `
                        <div class="detail-item">
                            <strong>Dispensary ID:</strong>
                            <p>${data.id}</p>
                        </div>
                        <div class="detail-item">
                            <strong>Address:</strong>
                            <p>${data.address}</p>
                        </div>
                        <div class="detail-item">
                            <strong>City:</strong>
                            <p>${data.city}</p>
                        </div>
                        <div class="detail-item">
                            <strong>License Number:</strong>
                            <p>${data.license_number}</p>
                        </div>
                        <div class="detail-item">
                            <strong>Contact Number:</strong>
                            <p>${data.contact_number}</p>
                        </div>
                        <div class="detail-item">
                            <strong>Doctor ID:</strong>
                            <p>${data.doctor_id}</p>
                        </div>
                        <div class="detail-item">
                            <strong>Opening Time:</strong>
                            <p>${data.open_time}</p>
                        </div>
                        <div class="detail-item">
                            <strong>Closing Time:</strong>
                            <p>${data.close_time}</p>
                        </div>
                    `;
                }
            })
            .catch(error => {
                document.getElementById('detailsSection').innerHTML = '<p>Error fetching data</p>';
            });
    } else {
        document.getElementById('detailsSection').innerHTML = '<p>No dispensary ID provided in URL.</p>';
    }

    document.getElementById('appointmentForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const doctor_id = document.getElementById('doctor_id').value;
        const patient_id = document.getElementById('patient_id').value;
        const patient_number = document.getElementById('patient_number').value;
        const dispensary_id = document.getElementById('dispensary_id').value;
        const date = document.getElementById('appointment_date').value;
        const time_slot = document.getElementById('time_slot').value;
        const status = document.getElementById('status').value;

        fetch('http://localhost/Medinet-backend/dispancery_profile.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                doctor_id,
                patient_id,
                patient_number,
                dispensary_id,
                date,
                time_slot,
                status
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Appointment added successfully!");
                document.getElementById('appointmentForm').reset();
            } else {
                alert("Error adding appointment.");
            }
        })
        .catch(error => {
            alert("Failed to add appointment.");
        });
    });
</script>

</body>
</html>
