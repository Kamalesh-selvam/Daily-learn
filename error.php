<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff5722, #ff7043);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .error-container {
            text-align: center;
            background: #fff;
            color: #333;
            border-radius: 8px;
            padding: 20px 40px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .error-container h1 {
            font-size: 36px;
            color: #d32f2f;
            margin-bottom: 20px;
        }
        .error-container p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .error-container a {
            text-decoration: none;
            padding: 10px 20px;
            color: #fff;
            background-color: #d32f2f;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .error-container a:hover {
            background-color: #b71c1c;
        }
        .error-icon {
            font-size: 50px;
            color: #d32f2f;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">❌</div>
        <h1>Registration Failed</h1>
        <p><?php echo htmlspecialchars($_GET['message']); ?></p>
        <a href="index.html">Try Again</a>
    </div>
</body>
</html>
