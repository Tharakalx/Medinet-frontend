<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Management - MediNet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 40px;
        }
        h1 {
            text-align: center;
            margin-bottom: 40px;
        }
        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }
        .card-body {
            padding: 20px;
        }
        .card h5 {
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            border: none;
            font-size: 16px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-info {
            background-color: #17a2b8;
            color: white;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-warning {
            background-color: #ffc107;
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f1f1f1;
        }
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pharmacy Management - MediNet</h1>

        <!-- Automatic Prescription Retrieval -->
        <div class="card">
            <div class="card-body">
                <h5>Prescription Retrieval</h5>
                <input type="text" class="form-control" placeholder="Enter Prescription ID">
                <button class="btn btn-primary">Retrieve Prescription</button>
            </div>
        </div>

        <!-- Patient History and Details -->
        <div class="card">
            <div class="card-body">
                <h5>Patient History</h5>
                <input type="text" class="form-control" placeholder="Enter Patient ID">
                <button class="btn btn-info">View History</button>
            </div>
        </div>

        <!-- Prescription List -->
        <div class="card">
            <div class="card-body">
                <h5>Prescription List</h5>
                <table>
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Medicine</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>Paracetamol</td>
                            <td>Ready</td>
                            <td><button class="btn btn-success">Dispense</button></td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>Ibuprofen</td>
                            <td>Pending</td>
                            <td><button class="btn btn-warning">Process</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
