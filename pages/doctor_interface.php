<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Dashboard</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 20px;
      background: #eef2f5;
    }
    .container {
      max-width: 1000px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    h1, h2 {
      text-align: center;
      color: #34495e;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }
    th, td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #3498db;
      color: #fff;
      font-weight: 600;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
    button {
      padding: 8px 15px;
      margin: 5px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
      transition: 0.3s;
    }
    .accept-btn {
      background-color: #2ecc71;
      color: #fff;
    }
    .accept-btn:hover {
      background-color: #27ae60;
    }
    .remove-btn {
      background-color: #e74c3c;
      color: #fff;
    }
    .remove-btn:hover {
      background-color: #c0392b;
    }
    .view-btn {
      background-color: #3498db;
      color: #fff;
    }
    .view-btn:hover {
      background-color: #2980b9;
    }
    .patient-details {
      margin-top: 30px;
      background: #f8f9fa;
      padding: 20px;
      border-radius: 8px;
      display: none;
    }
    .prescription-form {
      margin-top: 20px;
    }
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      min-height: 100px;
      resize: vertical;
    }
    .submit-btn {
      background-color: #27ae60;
      color: white;
      margin-top: 10px;
      padding: 10px 25px;
      border-radius: 6px;
      font-size: 16px;
      display: inline-block;
    }
    .submit-btn:hover {
      background-color: #219150;
    }
    .loading {
      text-align: center;
      padding: 20px;
      color: #7f8c8d;
      font-style: italic;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Doctor Dashboard</h1>

  <h2>Pending Appointments</h2>
  <div id="loading-appointments" class="loading">Loading appointments...</div>
  
  <table id="appointments-table">
    <thead>
      <tr>
      <th>Appointment No</th>
      <th>Patient ID</th>
      <th>Patient Name</th>
      <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- Appointments will be loaded here -->
    </tbody>
  </table>

  <div id="patient-details" class="patient-details">
    <h2>Patient Information</h2>
    <div id="patient-info"></div>

    <div class="prescription-form">
      <h3>Write Prescription</h3>
      <textarea id="prescription-text" placeholder="Enter prescription details..."></textarea>
      <button id="submit-prescription" class="submit-btn">Submit Prescription</button>
    </div>
  </div>
</div>

<script>
let currentPatientId = null;

document.addEventListener('DOMContentLoaded', function () {
  loadAppointments();
  document.getElementById('submit-prescription').addEventListener('click', submitPrescription);
});

function loadAppointments() {
  fetch('../../Medinet-backend/get_appointments.php')
    .then(response => response.json())
    .then(data => {
      const tbody = document.querySelector('#appointments-table tbody');
      tbody.innerHTML = '';

      if (data.length === 0) {
        tbody.innerHTML = '<tr><td colspan="4">No pending appointments</td></tr>';
      } else {
        data.forEach(appointment => {
          const row = `
            <tr>
              <td>${appointment.id}</td>
              <td>${appointment.patient_id}</td>
              <td>${appointment.patient_name}</td>
              <td>
                <button class="accept-btn" onclick="acceptAppointment(${appointment.id})">Accept</button>
                <button class="remove-btn" onclick="removeAppointment(${appointment.id})">Remove</button>
                <button class="view-btn" onclick="viewPatient('${appointment.patient_id}')">View</button>
              </td>
            </tr>
          `;
          tbody.innerHTML += row;
        });
      }
    })
    .catch(() => alert('Failed to load appointments.'));
}

function acceptAppointment(id) {
  if (confirm('Accept this appointment?')) {
    const formData = new FormData();
    formData.append('id', id);

    fetch('../../Medinet-backend/accept_appointment.php', { method: 'POST', body: formData })
      .then(response => response.text())
      .then(msg => {
        alert(msg);

        // Remove the appointment row immediately from the UI
        const row = [...document.querySelectorAll('#appointments-table tbody tr')]
          .find(r => r.querySelector('td')?.textContent == id);
        if (row) {
          row.remove(); // This removes the accepted row from table
        }

        // Then view patient details
        const patientId = row?.querySelectorAll('td')[1]?.textContent;
        if (patientId) {
          currentAppointmentId = id;
          viewPatient(patientId);
        }

      })
      .catch(() => alert('Failed to accept appointment.'));
  }
}


function removeAppointment(id) {
  if (confirm('Remove this appointment?')) {
    const formData = new FormData();
    formData.append('id', id);

    fetch('../../Medinet-backend/remove_appointment.php', { method: 'POST', body: formData })
      .then(response => response.text())
      .then(msg => {
        alert(msg);
        loadAppointments();
      })
      .catch(() => alert('Failed to remove appointment.'));
  }
}

function viewPatient(patientId) {
  fetch(`../../Medinet-backend/get_patient.php?patient_id=${patientId}`)
    .then(response => response.json())
    .then(patient => {
      if (patient.error) {
        alert('Patient not found.');
        return;
      }

      currentPatientId = patientId;
      currentPatientName = patient.name;

      const infoHTML = `
  <p><strong>Name:</strong> ${patient.name}</p>
  <p><strong>Date of Birth:</strong> ${patient.date_of_birth}</p>
  <p><strong>Age:</strong> ${calculateAge(patient.date_of_birth)} years</p>
  <p><strong>Blood Group:</strong> ${patient.blood_group ?? 'N/A'}</p>
  <p><strong>Weight:</strong> ${patient.weight ?? 'N/A'} kg</p>
  <p><strong>Height:</strong> ${patient.height ?? 'N/A'} cm</p>
`;

      document.getElementById('patient-info').innerHTML = infoHTML;
      document.getElementById('patient-details').style.display = 'block';
    })
    .catch(() => alert('Failed to load patient details.'));
}

function submitPrescription() {
  if (!currentPatientId || !currentAppointmentId) {
    return alert('No patient selected.');
  }

  const prescription = document.getElementById('prescription-text').value.trim();
  if (!prescription) {
    return alert('Please enter prescription details.');
  }

  const formData = new FormData();
  formData.append('patient_id', currentPatientId);
  formData.append('appointment_id', currentAppointmentId);
  formData.append('description', prescription);

  fetch('../../Medinet-backend/add_prescription.php', { method: 'POST', body: formData })
    .then(response => response.text())
    .then(msg => {
      alert(msg);
      document.getElementById('prescription-text').value = '';
      document.getElementById('patient-details').style.display = 'none';
      
    })
    .catch(() => alert('Failed to submit prescription.'));
}


function calculateAge(dob) {
  const birthDate = new Date(dob);
  const today = new Date();
  let age = today.getFullYear() - birthDate.getFullYear();
  const m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  return age;
}

</script>

</body>
</html>
