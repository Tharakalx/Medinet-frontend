
<?php

// Include the database connection file

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration - MediNet</title>
    <style>
        :root {
            --primary-color: #2196F3;
            --primary-dark: #1976D2;
            --error-color: #f44336;
            --success-color: #4CAF50;
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

        .container {
            background: white;
            padding: 40px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            width: 600px;
            max-width: 95%;
            margin: 40px auto;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, var(--primary-color), var(--primary-dark));
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.2em;
            position: relative;
            padding-bottom: 10px;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-color);
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
            font-size: 0.95em;
            transition: all 0.3s ease;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: var(--border-radius);
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
            outline: none;
            background: white;
        }

        .password-container {
            position: relative;
            margin-bottom: 25px;
        }

        .password-requirements {
            font-size: 0.85em;
            color: #666;
            margin-top: 8px;
            padding: 12px 15px;
            background: #f8f9fa;
            border-radius: var(--border-radius);
            border-left: 3px solid var(--primary-color);
            display: block; /* Changed from 'none' to 'block' to show by default */
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .requirement {
            margin: 8px 0;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            position: relative;
            padding-left: 25px;
        }

        .requirement::before {
            content: '•';
            position: absolute;
            left: 8px;
            color: #999;
        }

        .requirement.valid {
            color: var(--success-color);
        }

        .requirement.valid::before {
            content: '✓';
            color: var(--success-color);
        }

        .requirement.invalid {
            color: #666;
        }

        .requirement.invalid::before {
            content: '•';
            color: #999;
        }

        margin: 5px 0;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        }

        .requirement.valid {
            color: var(--success-color);
        }

        .requirement.invalid {
            color: var(--error-color);
        }

        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: var(--border-radius);
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.3);
        }

        button:active {
            transform: translateY(0);
        }

        .error-message {
            color: var(--error-color);
            font-size: 0.85em;
            margin-top: 5px;
            padding: 8px;
            border-radius: var(--border-radius);
            background: rgba(244, 67, 54, 0.1);
        }

        .success-message {
            background: #E8F5E9;
            color: var(--success-color);
            padding: 15px;
            border-radius: var(--border-radius);
            margin-bottom: 20px;
            text-align: center;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .feedback-text {
            font-size: 0.85em;
            margin-top: 5px;
            min-height: 20px;
            transition: all 0.3s ease;
        }

        .is-valid {
            border-color: var(--success-color) !important;
        }

        .is-invalid {
            border-color: var(--error-color) !important;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                margin: 20px auto;
            }

            h2 {
                font-size: 1.8em;
            }

            button {
                padding: 12px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Patient Registration</h2>
        <div style="text-align: right; margin-bottom: 20px;">
            <a href="patient_login.php" style="color: var(--primary-color); text-decoration: none; font-weight: 500;">
                Already have an account? Login here
            </a>
        </div>
        <form id="registrationForm">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <div class="form-group">
                <label for="nic">NIC</label>
                <input type="text" id="nic" name="nic" required pattern="[0-9VvXx]{10,12}" title="Enter a valid NIC (old: 9 digits + V/X, new: 12 digits)">
                <div id="nic-feedback" class="feedback-text"></div>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}" title="Enter a valid 10-digit phone number">
                <div id="phone-feedback" class="feedback-text"></div>
            </div>

            <label for="address">Address</label>
            <textarea id="address" name="address" rows="4" placeholder="Enter your home address here..." required></textarea>

            <label for="city">City</label>
            <input type="text" id="city" name="city" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
                <div id="username-feedback" class="feedback-text"></div>
            </div>

            <div class="password-container">
                <label for="password">Password</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       required 
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                       placeholder="Enter a strong password"
                       title="Password must be at least 8 characters long and include uppercase, lowercase, number and special character">
                <div class="password-requirements">
                    <div class="requirement" data-requirement="length">At least 8 characters long</div>
                    <div class="requirement" data-requirement="lowercase">One lowercase letter</div>
                    <div class="requirement" data-requirement="uppercase">One uppercase letter</div>
                    <div class="requirement" data-requirement="number">One number</div>
                    <div class="requirement" data-requirement="special">One special character (@$!%*?&)</div>
                </div>
            </div>

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

            

            <button type="submit">Register</button>
        </form>
    </div>
    <style>
    /* Add these new styles */
    .feedback-text {
        font-size: 14px;
        margin-top: 5px;
        min-height: 20px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .is-valid {
        border-color: var(--success-color) !important;
    }

    .is-invalid {
        border-color: var(--error-color) !important;
    }
    </style>
    <script>
    /* Add the new validation function at the beginning of your script */
    function checkField(field, value) {
        const formData = new FormData();
        formData.append('check_field', true);
        formData.append('field', field);
        formData.append('value', value);
    
        fetch('../../Medinet-backend/patientreg.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(result => {
            const inputField = document.getElementById(field);
            const feedbackElement = document.getElementById(`${field}-feedback`);
            
            if (result === 'exists') {
                inputField.classList.add('is-invalid');
                inputField.classList.remove('is-valid');
                feedbackElement.textContent = `This ${field} is already taken`;
                feedbackElement.style.color = 'red';
            } else {
                inputField.classList.add('is-valid');
                inputField.classList.remove('is-invalid');
                feedbackElement.textContent = `${field} is available`;
                feedbackElement.style.color = 'green';
            }
        });
    }

    /* Add these event listeners after your existing script */
    document.getElementById('username').addEventListener('blur', function() {
        if (this.value) checkField('username', this.value);
    });

    document.getElementById('nic').addEventListener('blur', function() {
        if (this.value) checkField('nic', this.value);
    });

    document.getElementById('phone').addEventListener('blur', function() {
        if (this.value) checkField('phone', this.value);
    });

    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch("../../Medinet-backend/patientreg.php", {
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

    // Add password validation
    // Password strength checker
    document.getElementById("password").addEventListener("input", function() {
        const password = this.value;
        const strengthBar = document.querySelector(".password-strength");
        
        // Check password strength
        let strength = 0;
        if (password.match(/[a-z]+/)) strength += 1;
        if (password.match(/[A-Z]+/)) strength += 1;
        if (password.match(/[0-9]+/)) strength += 1;
        if (password.match(/[$@#&!]+/)) strength += 1;

        // Update strength bar
        strengthBar.className = "password-strength";
        if (password.length < 8) {
            strengthBar.classList.add("strength-weak");
        } else if (strength < 3) {
            strengthBar.classList.add("strength-medium");
        } else {
            strengthBar.classList.add("strength-strong");
        }
    });

    // Enhanced password validation
    const passwordInput = document.getElementById('password');
    const requirements = document.querySelector('.password-requirements');
    
    passwordInput.addEventListener('focus', () => {
        requirements.classList.add('show');
    });

    passwordInput.addEventListener('blur', () => {
        if (!passwordInput.value) {
            requirements.classList.remove('show');
        }
    });

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        
        // Check each requirement
        const checks = {
            length: password.length >= 8,
            lowercase: /[a-z]/.test(password),
            uppercase: /[A-Z]/.test(password),
            number: /[0-9]/.test(password),
            special: /[@$!%*?&]/.test(password)
        };
    
        // Update requirement status
        Object.keys(checks).forEach(check => {
            const requirement = requirements.querySelector(`[data-requirement="${check}"]`);
            requirement.classList.remove('valid', 'invalid');
            requirement.classList.add(checks[check] ? 'valid' : 'invalid');
        });
    
        // Update overall password strength
        const strength = Object.values(checks).filter(Boolean).length;
        const strengthBar = document.querySelector('.password-strength');
        strengthBar.className = 'password-strength';
        
        if (strength < 2) strengthBar.classList.add('strength-weak');
        else if (strength < 4) strengthBar.classList.add('strength-medium');
        else strengthBar.classList.add('strength-strong');
    });

    // Form validation enhancement
    const form = document.getElementById("registrationForm");
    const inputs = form.querySelectorAll("input, select, textarea");

    inputs.forEach(input => {
        input.addEventListener("blur", function() {
            validateField(this);
        });
    });

    function validateField(field) {
        const errorDiv = field.nextElementSibling;
        if (!field.checkValidity()) {
            if (!errorDiv || !errorDiv.classList.contains("error-message")) {
                const error = document.createElement("div");
                error.className = "error-message";
                error.style.display = "block";
                error.textContent = field.validationMessage;
                field.parentNode.insertBefore(error, field.nextSibling);
            }
        } else {
            if (errorDiv && errorDiv.classList.contains("error-message")) {
                errorDiv.remove();
            }
        }
    }

    // Smooth form submission with loading state
    form.addEventListener("submit", async function(event) {
        event.preventDefault();
        const submitButton = this.querySelector("button[type='submit']");
        const originalText = submitButton.textContent;
        
        try {
            submitButton.disabled = true;
            submitButton.textContent = "Registering...";
            
            const formData = new FormData(this);
            const response = await fetch("../../Medinet-backend/patientreg.php", {
                method: "POST",
                body: formData
            });

            if (!response.ok) {
                throw new Error("Server error: " + response.status);
            }

            const data = await response.text();
            
            if (data.trim() === "success") {
                showMessage("Registration successful! Redirecting to login page...", "success");
                this.reset();
                setTimeout(() => {
                    window.location.href = "patient_login.php";  // Updated redirect path
                }, 2000);
            } else {
                showMessage("Error: " + data, "error");
            }
        } catch (error) {
            showMessage("Error: " + error.message, "error");
        } finally {
            submitButton.disabled = false;
            submitButton.textContent = originalText;
        }
    });

    function showMessage(message, type) {
        const messageDiv = document.createElement("div");
        messageDiv.className = type === "success" ? "success-message" : "error-message";
        messageDiv.style.display = "block";
        messageDiv.textContent = message;
        
        const container = document.querySelector(".container");
        container.insertBefore(messageDiv, container.firstChild);
        
        setTimeout(() => {
            messageDiv.remove();
        }, 5000);
    }
</script>
</body>
</html>

