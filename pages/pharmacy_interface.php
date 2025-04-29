<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pharmacy Management System</title>
  <style>
    :root {
      --primary-color: #1a6fc9;
      --secondary-color: #f0f8ff;
      --accent-color: #0d4d8c;
      --danger-color: #e74c3c;
      --success-color: #2ecc71;
      --text-color: #333;
      --light-gray: #f5f5f5;
      --white: #ffffff;
    }
    
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
      color: var(--text-color);
      background-color: #f9f9f9;
      padding: 0;
      margin: 0;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    
    header {
      background-color: var(--primary-color);
      color: white;
      padding: 20px 0;
      margin-bottom: 30px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    header h1 {
      font-weight: 300;
      font-size: 28px;
      margin-left: 20px;
    }
    
    .section {
      background-color: var(--white);
      border-radius: 8px;
      box-shadow: 0 2px 15px rgba(0,0,0,0.05);
      padding: 25px;
      margin-bottom: 30px;
    }
    
    h2 {
      color: var(--primary-color);
      font-weight: 500;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 1px solid #eee;
    }
    
    h3 {
      color: var(--accent-color);
      font-weight: 500;
      margin: 20px 0 15px;
    }
    
    .input-group {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 10px;
      margin-bottom: 15px;
    }
    
    input, select {
      padding: 10px 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
      min-width: 200px;
      transition: border 0.3s;
    }
    
    input:focus, select:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 2px rgba(26, 111, 201, 0.2);
    }
    
    button {
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
      transition: all 0.3s;
      font-weight: 500;
    }
    
    .btn-primary {
      background-color: var(--primary-color);
      color: white;
    }
    
    .btn-primary:hover {
      background-color: var(--accent-color);
    }
    
    .btn-danger {
      background-color: var(--danger-color);
      color: white;
    }
    
    .btn-danger:hover {
      background-color: #c0392b;
    }
    
    .btn-success {
      background-color: var(--success-color);
      color: white;
    }
    
    .btn-success:hover {
      background-color: #27ae60;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      font-size: 14px;
    }
    
    th {
      background-color: var(--primary-color);
      color: white;
      text-align: left;
      padding: 12px 15px;
      font-weight: 500;
    }
    
    td {
      padding: 12px 15px;
      border-bottom: 1px solid #eee;
      vertical-align: middle;
    }
    
    tr:nth-child(even) {
      background-color: var(--secondary-color);
    }
    
    tr:hover {
      background-color: #e6f2ff;
    }
    
    .table-input {
      width: 100%;
      padding: 8px 10px;
      border: 1px solid #ddd;
      border-radius: 3px;
    }
    
    .status-badge {
      display: inline-block;
      padding: 3px 8px;
      border-radius: 12px;
      font-size: 12px;
      font-weight: 500;
    }
    
    .status-active {
      background-color: #d4edda;
      color: #155724;
    }
    
    .status-expired {
      background-color: #f8d7da;
      color: #721c24;
    }
    
    .action-buttons {
      display: flex;
      gap: 5px;
    }
    
    .hidden {
      display: none;
    }
    
    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 4px;
    }
    
    .alert-info {
      background-color: #d1ecf1;
      color: #0c5460;
    }
    
    @media (max-width: 768px) {
      .input-group {
        flex-direction: column;
        align-items: flex-start;
      }
      
      input, select, button {
        width: 100%;
      }
      
      .action-buttons {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>

  <header>
    <div class="container">
      <h1>Pharmacy Management System</h1>
    </div>
  </header>

  <div class="container">
    <!-- Section 1: Prescription Lookup -->
    <div class="section">
      <h2>Prescription Lookup</h2>
      <div class="input-group">
        <input type="text" id="patientId" placeholder="Enter Patient ID">
        <button class="btn-primary" onclick="fetchPrescription()">Fetch Prescription</button>
      </div>
      
      <div id="prescriptionAlert" class="alert alert-info hidden">
        No prescriptions found for this patient.
      </div>
      
      <table id="prescriptionTable" class="hidden">
        <thead>
          <tr>
            <th>Prescription ID</th>
            <th>Date & Time</th>
            <th>Doctor ID</th>
            <th>Appointment ID</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <!-- Section 2: Medicine Inventory Management -->
    <div class="section">
      <h2>Medicine Inventory Management</h2>

      <h3>Add New Medicine</h3>
      <div class="input-group">
        <input type="text" id="medName" placeholder="Medicine Name">
        <input type="number" id="medStock" placeholder="Stock Quantity">
        <input type="date" id="medExpiry" placeholder="Expiry Date">
        <button class="btn-success" onclick="addMedicine()">Add Medicine</button>
      </div>

      <h3>Medicine Inventory</h3>
      <table id="medicineTable">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Expiry Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>

<script>
// Fetch Prescription
function fetchPrescription() {
  let patientId = document.getElementById('patientId').value;
  if (patientId.trim() === "") {
    alert("Please enter Patient ID");
    return;
  }
  
  // Show loading state
  document.getElementById('prescriptionTable').classList.add('hidden');
  document.getElementById('prescriptionAlert').classList.add('hidden');
  
  fetch('../../Medinet-backend/Medinet-backend/fetch_prescription.php?patient_id=' + patientId)
    .then(response => response.json())
    .then(data => {
      let table = document.getElementById('prescriptionTable');
      let tbody = table.querySelector('tbody');
      let alertDiv = document.getElementById('prescriptionAlert');
      tbody.innerHTML = '';

      if (data.length > 0) {
        data.forEach(row => {
          let tr = document.createElement('tr');
          tr.innerHTML = `
            <td>${row.id}</td>
            <td>${new Date(row.date_time).toLocaleString()}</td>
            <td>DR-${row.doctor_id}</td>
            <td>APT-${row.appointment_id}</td>
          `;
          tbody.appendChild(tr);
        });
        table.classList.remove('hidden');
        alertDiv.classList.add('hidden');
      } else {
        alertDiv.classList.remove('hidden');
        table.classList.add('hidden');
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while fetching prescriptions.');
    });
}

// Fetch Medicines
function fetchMedicines() {
  fetch('../../Medinet-backend/Medinet-backend/fetch_medicines.php')
    .then(response => response.json())
    .then(data => {
      let tbody = document.getElementById('medicineTable').querySelector('tbody');
      tbody.innerHTML = '';

      data.forEach(row => {
        let expiryDate = new Date(row.expiry);
        let today = new Date();
        let status = expiryDate > today ? 
          '<span class="status-badge status-active">Active</span>' : 
          '<span class="status-badge status-expired">Expired</span>';
        
        let tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${row.id}</td>
          <td><input type="text" class="table-input" value="${row.name}" id="name-${row.id}"></td>
          <td><input type="number" class="table-input" value="${row.stock}" id="stock-${row.id}"></td>
          <td><input type="date" class="table-input" value="${row.expiry}" id="expiry-${row.id}"></td>
          <td>${status}</td>
          <td class="action-buttons">
            <button class="btn-primary" onclick="updateMedicine(${row.id})">Save</button>
            <button class="btn-danger" onclick="deleteMedicine(${row.id})">Delete</button>
          </td>
        `;
        tbody.appendChild(tr);
      });
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while fetching medicines.');
    });
}

// Add Medicine
function addMedicine() {
  let name = document.getElementById('medName').value;
  let stock = document.getElementById('medStock').value;
  let expiry = document.getElementById('medExpiry').value;

  if (name.trim() === "" || stock === "" || expiry === "") {
    alert("Please fill all fields");
    return;
  }

  fetch('../../Medinet-backend/Medinet-backend/add_medicine.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ name, stock, expiry })
  })
  .then(response => response.text())
  .then(data => {
    alert(data);
    fetchMedicines();
    // Clear form
    document.getElementById('medName').value = "";
    document.getElementById('medStock').value = "";
    document.getElementById('medExpiry').value = "";
  })
  .catch(error => {
    console.error('Error:', error);
    alert('An error occurred while adding the medicine.');
  });
}

// Update Medicine
function updateMedicine(id) {
  const name = document.getElementById(`name-${id}`).value;
  const stock = document.getElementById(`stock-${id}`).value;
  const expiry = document.getElementById(`expiry-${id}`).value;

  if (name.trim() === "" || stock === "" || expiry === "") {
    alert("All fields are required.");
    return;
  }

  fetch('../../Medinet-backend/Medinet-backend/update_medicine.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ id, name, stock, expiry })
  })
  .then(response => response.text())
  .then(data => {
    alert(data);
    fetchMedicines(); // refresh table
  })
  .catch(error => {
    console.error('Error:', error);
    alert('An error occurred while updating the medicine.');
  });
}

// Delete Medicine
function deleteMedicine(id) {
  if (confirm('Are you sure you want to delete this medicine? This action cannot be undone.')) {
    fetch('../../Medinet-backend/Medinet-backend/delete_medicine.php?id=' + id)
      .then(response => response.text())
      .then(data => {
        alert(data);
        fetchMedicines();
      })
      .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while deleting the medicine.');
      });
  }
}

// Initial load
document.addEventListener('DOMContentLoaded', function() {
  fetchMedicines();
});
</script>

</body>
</html>
