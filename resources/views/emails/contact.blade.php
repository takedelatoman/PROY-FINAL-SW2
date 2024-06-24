<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de bolChain</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #e9e9e9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .header, .footer {
            text-align: center;
            padding: 10px;
        }
        .content {
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nuevo Mensaje de bolChain</h2>
        </div>
        <div class="content">
            <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Asunto:</strong> {{ $data['subject'] }}</p>
            <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
        </div>
        <div class="footer">
        &copy; Copyright <strong><span>bolChain</span></strong>. Todos los derechos reservados

        </div>
    </div>
</body>
</html>
