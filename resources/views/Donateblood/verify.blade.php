<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Phone Number</title>
    <style>
        body {
            font-family: 'Noto Sans', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(120deg, #f5f5f0, #e0e0d1);
        }
        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(179,0,0,0.2) 20%, transparent 20%),
                        radial-gradient(circle, rgba(179,0,0,0.2) 20%, transparent 20%);
            background-size: 50px 50px;
            animation: moveBackground 10s linear infinite;
        }
        @keyframes moveBackground {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(-50px, -50px);
            }
        }
        .container {
            position: relative;
            z-index: 1;
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #e0e0d1;
        }
        h2 {
            font-family: 'Noto Serif', serif;
            color: #b30000;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            text-align: center;
            font-size: 1.1em;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #b30000;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            cursor: pointer;
        }
        button:hover {
            background-color: #990000;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&family=Noto+Serif&display=swap" rel="stylesheet">
</head>
<body>
    <div class="background-animation"></div>
    <div class="container">
        <h2>Verify Your Phone Number</h2>
        <p>Please enter the verification code sent to your phone number: <strong>{{ $phone }}</strong></p>

        <form action="{{ route('donate.verify.post', ['phone' => $phone]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="verification_code">Verification Code</label>
                <input type="text" class="form-control" id="verification_code" name="verification_code" required>
            </div>
            <button type="submit">Verify</button>
        </form>
    </div>
</body>
</html>