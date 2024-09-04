<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Care</title>
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">   
    <style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        text-align: center;
    }
    .container h1 {
        color: #32a852;
        font-family: sans-serif;
        font-size: 35px;
    }
    .container p {
        color: red;
        font-weight: 600;
        font-family: serif;
        font-size: 20px;
    }
    .container h1, .container p {
        margin-bottom: 20px;
    }
    .out {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .profile-image {
        width: 50%;
        margin-bottom: 10px;
        height: auto !important;
    }
    .out h1 {
        margin-bottom: 20px;
    }
    .back-button {
        margin-top: 20px;
        padding: 10px 20px;
        font-size: 16px;
        color: white;
        background-color: #32a852;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }
    .back-button:hover {
        background-color: #28a745;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="out">
            <img src="{{ asset('assets/img/logo/Newlogo.png') }}" alt="Pet Care Image" class="profile-image">
            <h1>Your QR Code</h1>
            <div class="qr-code-container">
                {!! $qrCode !!}
            </div>
            <p>Scan this QR code to view your information.</p>
            <a href="{{ url('/') }}" class="back-button">Back to Home</a>
        </div>
    </div>
</body>
</html>
