<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediNet Patient Login</title>
    <style>
        :root {
            --primary-color: #2196F3;
            --primary-dark: #1976D2;
            --success-color: #4CAF50;
            --success-dark: #45a049;
            --error-color: #f44336;
            --border-radius: 10px;
            --box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            width: 400px;
            margin: 20px;
            padding: 40px;
            background: white;
            box-shadow: var(--box-shadow);
            border-radius: var(--border-radius);
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, var(--primary-color), var(--primary-dark));
        }

        .login-container h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.2em;
            position: relative;
            padding-bottom: 10px;
        }

        .login-container h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-color);
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 2px solid #e0e0e0;
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
            box-sizing: border-box;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
            outline: none;
            background: white;
        }

        .button-container {
            margin-top: 25px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .login-button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, var(--success-color), var(--success-dark));
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        .register-button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            transition: all 0.3s ease;
        }

        .register-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
        }

        .divider {
            text-align: center;
            margin: 20px 0;
            position: relative;
            color: #666;
            font-size: 0.9em;
        }

        .divider::before, .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 45%;
            height: 1px;
            background: #ddd;
        }

        .divider::before { left: 0; }
        .divider::after { right: 0; }

        .error {
            color: var(--error-color);
            text-align: center;
            margin-top: 15px;
            padding: 10px;
            border-radius: var(--border-radius);
            background: rgba(244, 67, 54, 0.1);
            font-size: 0.9em;
            display: none;
        }

        .error.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .login-container {
                width: 100%;
                margin: 10px;
                padding: 20px;
            }

            .login-container h2 {
                font-size: 1.8em;
            }

            input[type="text"], input[type="password"],
            .login-button, .register-button {
                padding: 12px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Patient Login</h2>
    <input type="text" id="username" placeholder="Username" required />
    <input type="password" id="password" placeholder="Password" required />
    <div class="button-container">
        <button class="login-button" onclick="login()">Login</button>
        <div class="divider">OR</div>
        <a href="patient_register.php" class="register-button">Register as New Patient</a>
    </div>
    <div class="error" id="error"></div>
</div>

<script>
function login() {
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    fetch("../../Medinet-backend/patient_login.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json' // Important: Sending JSON
        },
        body: JSON.stringify({ username, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Login successful!");
            window.location.href = "patient_interface.php"; // Redirect after login
        } else {
            document.getElementById("error").innerText = data.message;
        }
    })
    .catch(error => {
        console.error("Error:", error);
        document.getElementById("error").innerText = "Something went wrong.";
    });
}
</script>

</body>
</html>
