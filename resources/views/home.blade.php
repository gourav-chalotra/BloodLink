<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BloodLink🩸</title>
    <style>
        /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        @import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap');

        body {
            background-color: #fff;
        }

        .buttonSection {
            display: flex;
        }

        * {
            margin: 0;
            padding: 0;
        }
        .container
        {
            display: flex;
            justify-content: center;
        }
        .headline
        {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-size: 140px;
            color: #17336b;
        }
        .tagline
        {
            text-align: center;
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-size: 30px;
        }
        button
        {
            cursor: pointer;
            width: 160px;
            height: 50px;
            border-radius: 20px;
            border: none;
        }
        .red_btn
        {
            background-color: #de4756;
            opacity: 1;
        }
        .blue_btn
        {
            opacity: 1;
            background-color: #15346b;
        }
        .red_btn:hover
        {
            transition: 0.3s;
            opacity: 1;
            background-color: black;
        }
        .blue_btn:hover
        {
            transition: 0.3s;
            opacity: 1;
            background-color: black;
        }
        .buttonSection
        {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .sub_tagline
        {
            text-align: center;
            font-family: "Lora", serif;
            margin-top: 10px;
            font-size: 14px;
        }
        a
        {
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="headline">BloodLink</h1>
            <h5 class="tagline">Donate Blood, Save Lives.</h5>
            <div class="buttonSection">
                <button class="red_btn"><a href="/home/needblood">Need Blood</a></button>
                <button class="blue_btn"><a href="/home/donateblood">Donate Blood</a></button>
            </div>
            <p class="sub_tagline">Join our community to save lives.</p>
        </div>
    </div>
</body>
</html>