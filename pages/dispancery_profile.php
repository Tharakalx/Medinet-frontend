<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispensary Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }

        .profile-box {
            width: 100%;
            max-width: 800px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            margin-top: 100px;
        }

        .title {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .detail-item strong {
            color: #333;
        }

        .detail-item p {
            color: #555;
        }

        .form-input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            width: 150px;
            height: 40px;
            background-color: green;
            color: white;
            text-align: center;
            line-height: 40px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: darkgreen;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-box">
            <h2 class="title">Dispensary Details</h2>

            <!-- Section to display the fetched details -->
            <div id="detailsSection"></div>
        </div>
    </div>

    <script>
        // Function to get query parameter from URL
        function getQueryParam(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        // Get the dispensary_id from URL (e.g., 
        const dispensary_id = getQueryParam('dispensary_id');

        // If dispensary_id exists, fetch the data from backend
        if (dispensary_id) {
            fetch(`http://localhost/Medinet-backend/dispancery_profile.php?id=${dispensary_id}`)
                .then(response => response.json())  // Parse the JSON response
                .then(data => {
                    if (data.message) {
                        // Display error message if no dispensary found
                        document.getElementById('detailsSection').innerHTML = `<p>${data.message}</p>`;
                    } else {
                        // Display the dispensary details
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
                    console.error('Error fetching dispensary details:', error);
                    document.getElementById('detailsSection').innerHTML = '<p>Error fetching data</p>';
                });
        } else {
            // If no dispensary_id is provided, display a message
            document.getElementById('detailsSection').innerHTML = '<p>No dispensary ID provided in URL.</p>';
        }
    </script>
</body>
</html>
