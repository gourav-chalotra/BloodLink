<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BloodLink - Donation Success</title>
    <style>
        body {
            background: linear-gradient(to bottom, #FFFFFF, #E3F2FD);
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 0;
            padding: 20px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100' width='10' height='10'%3E%3Cpath d='M50 10 L60 40 L40 40 Z' fill='none' stroke='%23D32F2F' stroke-width='1'/%3E%3C/svg%3E");
            background-repeat: repeat;
            background-size: 20px 20px;
            animation: fadeInBackground 1s ease-in-out;
        }
        @keyframes fadeInBackground {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            animation: slideUp 0.8s ease-out;
        }
        @keyframes slideUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .header {
            color: #0D47A1;
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }
        .tagline {
            color: #333333;
            font-size: 1.2em;
            margin-bottom: 20px;
            font-style: italic;
            opacity: 0.9;
        }
        .blood-drop {
            position: absolute;
            width: 35px;
            height: 35px;
            background: radial-gradient(circle at 50% 0%, #D32F2F 0%, #B71C1C 70%, transparent 100%);
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            top: -20px;
            left: -20px;
            opacity: 0.15;
            animation: pulse 2s infinite;
        }
        .blood-drop.right {
            right: -20px;
            left: auto;
        }
        @keyframes pulse {
            0% { transform: scale(1) rotate(-45deg); }
            50% { transform: scale(1.1) rotate(-45deg); }
            100% { transform: scale(1) rotate(-45deg); }
        }
        .success-message {
            padding: 25px;
            background: #E8F5E9;
            border: 2px solid #2E7D32;
            border-radius: 10px;
            color: #2E7D32;
            font-size: 1.3em;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(46, 125, 50, 0.1);
            animation: bounceIn 0.6s ease-out;
        }
        @keyframes bounceIn {
            0% { transform: scale(0.9); opacity: 0; }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); opacity: 1; }
        }
        .back-button {
            background-color: #D32F2F;
            color: #FFFFFF;
            padding: 14px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 25px;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 2px 4px rgba(211, 47, 47, 0.2);
        }
        .back-button:hover {
            background-color: #B71C1C;
            transform: translateY(-2px);
        }
        .back-button:active {
            transform: translateY(0);
        }
        @media (max-width: 600px) {
            .container {
                padding: 20px;
                margin: 0 10px;
            }
            .header {
                font-size: 2em;
            }
            .success-message {
                font-size: 1.1em;
                padding: 15px;
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

        <div class="success-message">
            @if(session()->has('success'))
                {{ session('success') }}
            @else
                Thank you for registering as a donor!
            @endif
        </div>

        <a href="{{ route('donate.show') }}">
            <button class="back-button">Back to Donation Form</button>
        </a>
    </div>
</body>
</html>