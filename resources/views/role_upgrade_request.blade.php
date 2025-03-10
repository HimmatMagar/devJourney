<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Upgrade Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        p {
            line-height: 1.6;
            color: #555;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
        .highlight {
            color: #007BFF; /* Bootstrap primary color */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Role Upgrade Request</h2>
        <p>User <span class="highlight">{{ $user }}</span> (<span class="highlight">{{ $email }}</span>) has requested to upgrade their role.</p>
        
        <h3>Message:</h3>
        <p>{{ $requestMessage }}</p>

        <p>Please review this request.</p>
        <h4>Submitted by User Id: <span class="highlight">{{ $user_id }}</span></h4>
    </div>
</body>
</html>