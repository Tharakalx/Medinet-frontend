<?php
// patient_dashboard.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #e0e7ff;
            --secondary: #3a0ca3;
            --text: #2b2d42;
            --text-light: #8d99ae;
            --bg: #f8f9fa;
            --card-bg: #ffffff;
            --border: #e9ecef;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            background: var(--primary);
            color: white;
            padding: 2rem 1rem;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
        }

        .user-name {
            font-weight: 500;
            font-size: 1.1rem;
        }

        .user-role {
            font-size: 0.8rem;
            opacity: 0.8;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.2);
        }

        .nav-link i {
            width: 20px;
            text-align: center;
        }

        /* Main Content Styles */
        .main-content {
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 1.8rem;
            color: var(--secondary);
        }

        .search-bar {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 30px;
            padding: 0.5rem 1rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            width: 300px;
        }

        .search-bar input {
            border: none;
            outline: none;
            padding: 0.5rem;
            width: 100%;
            font-size: 0.9rem;
        }

        .search-bar i {
            color: var(--text-light);
        }

        /* Dispensary Cards Grid */
        .dispensary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .dispensary-card {
            background: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid var(--border);
        }

        .dispensary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .card-image {
            height: 150px;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 2rem;
        }

        .card-content {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--secondary);
        }

        .card-detail {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .card-detail i {
            width: 20px;
            color: var(--primary);
        }

        .card-status {
            display: inline-block;
            padding: 0.3rem 0.8rem;
            background: #4bb54320;
            color: #4bb543;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border);
        }

        .card-rating {
            color: #ffb703;
            font-weight: 500;
        }

        .view-btn {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background 0.3s ease;
        }

        .view-btn:hover {
            background: var(--secondary);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard {
                grid-template-columns: 1fr;
            }
            
            .sidebar {
                height: auto;
                position: relative;
            }
            
            .main-content {
                padding: 1.5rem;
            }
            
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .search-bar {
                width: 100%;
            }
            
            .dispensary-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="user-profile">
                <img src="https://ui-avatars.com/api/?name=John+Doe&background=random" alt="User" class="user-avatar">
                <div>
                    <div class="user-name">John Doe</div>
                    <div class="user-role">Patient</div>
                </div>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-prescription-bottle-alt"></i>
                        <span>Prescriptions</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-medal"></i>
                        <span>Health Records</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="header">
                <h1 class="page-title">Find a Dispensary</h1>
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchInput" placeholder="Search dispensaries..." onkeyup="loadDispensaries()">
                </div>
            </div>
            
            <div id="dispensary-list">
                <!-- Dispensaries will be loaded here -->
                <div class="dispensary-grid">
                    <!-- Sample card - will be replaced by dynamic content -->
                    <div class="dispensary-card">
                        <div class="card-image">
                            <i class="fas fa-clinic-medical"></i>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">City Health Clinic</h3>
                            <div class="card-detail">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>123 Main St, Downtown</span>
                            </div>
                            <div class="card-detail">
                                <i class="fas fa-clock"></i>
                                <span>8:00 AM - 8:00 PM</span>
                            </div>
                            <div class="card-detail">
                                <i class="fas fa-phone"></i>
                                <span>(555) 123-4567</span>
                            </div>
                            <span class="card-status">Open Now</span>
                        </div>
                        <div class="card-footer">
                            <div class="card-rating">
                                <i class="fas fa-star"></i> 4.5
                            </div>
                            <button class="view-btn" onclick="viewDispensary(1)">
                                View <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function loadDispensaries() {
            var searchQuery = document.getElementById('searchInput').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../../Medinet-backend/get_dispensaries.php?search=' + encodeURIComponent(searchQuery), true);
            
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var dispensaries = JSON.parse(xhr.responseText);
                        renderDispensaries(dispensaries);
                    } catch (e) {
                        console.error("Error parsing response:", e);
                    }
                }
            };
            
            xhr.send();
        }

        function renderDispensaries(dispensaries) {
            var container = document.getElementById('dispensary-list');
            
            if (!dispensaries || dispensaries.length === 0) {
                container.innerHTML = `
                    <div style="text-align: center; padding: 2rem; color: var(--text-light);">
                        <i class="fas fa-map-marker-alt" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                        <h3>No dispensaries found</h3>
                        <p>Try adjusting your search query</p>
                    </div>
                `;
                return;
            }
            
            var html = '<div class="dispensary-grid">';
            
            dispensaries.forEach(function(d) {
                html += `
                    <div class="dispensary-card" onclick="viewDispensary(${d.id})">
                        <div class="card-image">
                            <i class="fas fa-clinic-medical"></i>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">${d.name || 'Dispensary'}</h3>
                            <div class="card-detail">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>${d.building_no} ${d.street}, ${d.district}</span>
                            </div>
                            <div class="card-detail">
                                <i class="fas fa-clock"></i>
                                <span>${d.open_time} - ${d.close_time}</span>
                            </div>
                            <div class="card-detail">
                                <i class="fas fa-phone"></i>
                                <span>${d.phone || 'Not available'}</span>
                            </div>
                            <span class="card-status">Open Now</span>
                        </div>
                        <div class="card-footer">
                            <div class="card-rating">
                                <i class="fas fa-star"></i> ${d.rating || '4.5'}
                            </div>
                            <button class="view-btn" onclick="event.stopPropagation(); viewDispensary(${d.id})">
                                View <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                `;
            });
            
            html += '</div>';
            container.innerHTML = html;
        }

        function viewDispensary(id) {
            alert('Viewing dispensary ID: ' + id);
            // In real implementation:
            // window.location.href = 'dispensary_profile.php?id=' + id;
        }

        // Load dispensaries when page loads
        document.addEventListener('DOMContentLoaded', function() {
            loadDispensaries();
        });
    </script>
</body>
</html>