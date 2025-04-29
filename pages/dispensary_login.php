<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medinet - Dispensary Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
        }
        .form-group input {
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        .login-button {
            background-color: #007bff;
            color: white;
            padding: 0.8rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #dc3545;
            margin-top: 1rem;
            text-align: center;
        }
        .register-button {
            background-color: #28a745;
            color: white;
            padding: 0.8rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            margin-top: 1rem;
        }
        .register-button:hover {
            background-color: #218838;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .logo-container {
            text-align: center;
            margin-bottom: 1rem;
        }
        .logo-container img {
            max-width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <h1 style="color: #007bff;">Medinet</h1>
            <h3 style="color: #666;">Dispensary Login</h3>
        </div>
        <form class="login-form" action="../backend/process_dispensary_login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    required 
                    placeholder="Enter your username"
                >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required 
                    placeholder="Enter your password"
                >
            </div>
            <div class="button-container">
                <button type="submit" class="login-button">Login</button>
                <a href="dispensary_register.php" class="register-button">Create New Account</a>
            </div>
            <!-- <?php
            if (isset($_GET['error'])) {
                echo '<p class="error-message">Invalid username or password</p>';
            }
            ?> -->
        </form>
    </div>
</body>
</html>