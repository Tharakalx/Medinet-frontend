<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Panel - Patient Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            padding: 20px;
            position: fixed;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .sidebar a:hover {
            background: #495057;
            border-radius: 5px;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            width: 100%;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>MediNet</h3>
        <a href="#" onclick="showSection('dashboard')">Dashboard</a>
        <a href="#" onclick="showSection('patients')">Manage Patients</a>
        <a href="#" onclick="showSection('prescriptions')">Issue Prescription</a>
        <a href="#" onclick="showSection('history')">Patient History</a>
    </div>

    <!-- Main Content -->
    <div class="content">

        <!-- Dashboard -->
        <div id="dashboard">
            <h2>Welcome, Doctor</h2>
            <p>Select an option from the sidebar to manage patients, prescriptions, or history.</p>
        </div>

        <!-- Patient Management -->
        <div id="patients" class="hidden">
            <h2>Manage Patients</h2>

            <!-- Add New Patient Form -->
            <div class="mb-3">
                <input type="text" id="newPatientName" class="form-control mb-2" placeholder="Patient Name">
                <input type="number" id="newPatientAge" class="form-control mb-2" placeholder="Age">
                <input type="text" id="newPatientCondition" class="form-control mb-2" placeholder="Condition">
                <button class="btn btn-success" onclick="addPatient()">Add Patient</button>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Condition</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="patient-list">
                    <!-- Patient data will be inserted here -->
                </tbody>
            </table>
        </div>

        <!-- Prescription Issuance -->
        <div id="prescriptions" class="hidden">
            <h2>Issue Prescription</h2>
            <input type="text" id="patientName" class="form-control mb-2" placeholder="Patient Name">
            <textarea id="prescriptionText" class="form-control mb-2" placeholder="Prescription Details"></textarea>
            <button class="btn btn-success" onclick="issuePrescription()">Submit</button>
        </div>

        <!-- Patient History -->
        <div id="history" class="hidden">
            <h2>Patient History</h2>
            <input type="text" id="searchPatient" class="form-control mb-2" placeholder="Search by Name">
            <button class="btn btn-primary" onclick="searchHistory()">Search</button>
            <div id="historyResults"></div>
        </div>

    </div>

    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.content > div').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');
        }

        // Sample patient data
        let patients = [
            { name: "John Doe", age: 45, condition: "Diabetes" },
            { name: "Jane Smith", age: 34, condition: "Hypertension" },
            { name: "Mark Wilson", age: 50, condition: "Heart Disease" }
        ];

        function loadPatients() {
            let table = document.getElementById("patient-list");
            table.innerHTML = "";
            patients.forEach((patient, index) => {
                let row = `
                    <tr>
                        <td><input type="text" value="${patient.name}" id="name-${index}" class="form-control"></td>
                        <td><input type="number" value="${patient.age}" id="age-${index}" class="form-control"></td>
                        <td><input type="text" value="${patient.condition}" id="condition-${index}" class="form-control"></td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="updatePatient(${index})">Update</button>
                            <button class="btn btn-danger btn-sm" onclick="removePatient(${index})">Remove</button>
                        </td>
                    </tr>
                `;
                table.innerHTML += row;
            });
        }

        function addPatient() {
            let name = document.getElementById("newPatientName").value;
            let age = document.getElementById("newPatientAge").value;
            let condition = document.getElementById("newPatientCondition").value;

            if (name && age && condition) {
                patients.push({ name, age, condition });
                loadPatients();
                document.getElementById("newPatientName").value = "";
                document.getElementById("newPatientAge").value = "";
                document.getElementById("newPatientCondition").value = "";
            } else {
                alert("Please fill all fields.");
            }
        }

        function updatePatient(index) {
            let updatedName = document.getElementById(`name-${index}`).value;
            let updatedAge = document.getElementById(`age-${index}`).value;
            let updatedCondition = document.getElementById(`condition-${index}`).value;

            patients[index] = { name: updatedName, age: updatedAge, condition: updatedCondition };
            alert("Patient information updated!");
        }

        function removePatient(index) {
            if (confirm("Are you sure you want to remove this patient?")) {
                patients.splice(index, 1);
                loadPatients();
            }
        }

        function issuePrescription() {
            let name = document.getElementById("patientName").value;
            let prescription = document.getElementById("prescriptionText").value;
            if (name && prescription) {
                alert(`Prescription for ${name} has been issued.`);
                document.getElementById("patientName").value = "";
                document.getElementById("prescriptionText").value = "";
            } else {
                alert("Please enter all details.");
            }
        }

        function searchHistory() {
            let name = document.getElementById("searchPatient").value.toLowerCase();
            let resultDiv = document.getElementById("historyResults");
            resultDiv.innerHTML = "";

            let matched = patients.filter(p => p.name.toLowerCase().includes(name));

            if (matched.length > 0) {
                matched.forEach(p => {
                    resultDiv.innerHTML += `<p><strong>${p.name}</strong> - ${p.condition}</p>`;
                });
            } else {
                resultDiv.innerHTML = "<p>No records found.</p>";
            }
        }

        window.onload = loadPatients;
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
