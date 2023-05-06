<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Email Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        /* Email styles */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            background-color: #f9f9f9;
            padding: 30px;
        }

        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            font-weight: bold;
        }

        p {
            margin-top: 0;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        /* Button styles */
        .button {
            display: inline-block;
            background-color: #007bff;
            border: none;
            color: #fff;
            font-size: 16px;
            line-height: 1.5;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
    <div style="max-width: 600px; margin: 0 auto;">
        <h1 style="text-align: center;">Email Verification</h1>
        <p>Dear user,</p>
        <p>Thank you for signing up on Tokyo Techno ! To complete your registration, please enter the verification code below:</p>
        <div style="background-color: #fff; border-radius: 5px; padding: 20px;">
            <h2 style="margin-top: 0;">Verification Code</h2>
            <p style="font-size: 24px; font-weight: bold; margin-top: 0;">{{$data['otp']}}</p>
        </div>
        <p>If you did not sign up for this service, please ignore this email.</p>
        <p>Thank you!</p>
        <p style="text-align: center;"><a href="#" class="button">Verify Email Address</a></p>
    </div>
</body>
</html>
