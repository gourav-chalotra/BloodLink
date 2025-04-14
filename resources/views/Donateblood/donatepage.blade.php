<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodLink - Donate Blood Registration</title>
    <style>
        body {
            background: linear-gradient(to bottom, #FFFFFF, #E3F2FD); /* White to light blue gradient */
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 0;
            padding: 20px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100' width='10' height='10'%3E%3Cpath d='M50 10 L60 40 L40 40 Z' fill='none' stroke='%23D32F2F' stroke-width='1'/%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 20px 20px; /* Subtle heartbeat-like pattern */
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        .header {
            color: #0D47A1;
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        .tagline {
            color: #333333;
            font-size: 1.2em;
            margin-bottom: 20px;
            font-style: italic;
        }
        .blood-drop {
            position: absolute;
            width: 30px;
            height: 30px;
            background: radial-gradient(circle at 50% 0%, #D32F2F 0%, #B71C1C 70%, transparent 100%);
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            top: -15px;
            left: -15px;
            opacity: 0.1;
        }
        .blood-drop.right {
            right: -15px;
            left: auto;
        }
        .registration-form {
            padding: 20px;
            background: #FFFFFF;
            border: 2px solid #1976D2;
            border-radius: 8px;
        }
        h3 {
            color: #0D47A1;
            margin-bottom: 15px;
            font-size: 1.5em;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #B0BEC5;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.3s;
        }
        input:focus, select:focus {
            border-color: #1976D2;
            outline: none;
        }
        button {
            background-color: #D32F2F;
            color: #FFFFFF;
            padding: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1em;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #B71C1C;
        }
        .error {
            color: #D32F2F;
            font-size: 0.9em;
            text-align: left;
            margin-top: -5px;
            margin-bottom: 10px;
            display: none;
        }
        .success {
            color: #2E7D32;
            font-size: 1em;
            padding: 10px;
            background: #E8F5E9;
            border-radius: 5px;
            margin-top: 10px;
            display: {{ session()->has('success') ? 'block' : 'none' }};
        }
        @media (max-width: 600px) {
            .container {
                padding: 15px;
                margin: 0 10px;
            }
            .header {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="blood-drop"></div>
        <div class="blood-drop right"></div>
        <div class="header">BloodLink</div>
        <div class="tagline">Be a Hero, Donate Blood Today</div>

        <div class="registration-form">
            <h3>Register to Donate Blood</h3>
            <form id="donateBloodForm" method="POST" action="{{ route('donate.store') }}">
                @csrf
                <input type="text" name="username" placeholder="Enter Username" required>
                <div class="error" id="usernameError">Username is required.</div>

                <input type="email" name="email" placeholder="Enter Email" required>
                <div class="error" id="emailError">Valid email is required.</div>

                <input type="tel" name="phone" placeholder="Enter Phone Number (10 digits)" pattern="[0-9]{10}" required>
                <div class="error" id="phoneError">10-digit phone number is required.</div>

                <input type="text" name="location" placeholder="Enter Location" required>
                <div class="error" id="locationError">Location is required.</div>

                <select name="blood_group" required>
                    <option value="">Select Your Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                </select>
                <div class="error" id="bloodGroupError">Blood group is required.</div>

                <button type="submit">Donate Blood Now</button>
                <div class="success" id="successMessage" style="display: {{ session()->has('success') ? 'block' : 'none' }};">
                    @if(session()->has('success'))
                        {{ session('success') }}
                    @endif
                </div>
            </form>
        </div>
    </div>
</body>
</html>