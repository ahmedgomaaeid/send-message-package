<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telegram Chat ID Taker</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
            background-color: #f4f4f4;

        }
        .card {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
            width: 400px;
            max-width: 90vw;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 25px;
            color: #333;
        }
        p {
            font-size: 16px;
            margin: 8px 0;
            line-height: 1.5;
        }
        i {
            font-size: 64px;
            margin-bottom: 15px;
        }
        button:hover {
            background-color: #228be6 !important;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(51, 154, 240, 0.3);
        }
        button:active {
            transform: translateY(0);
        }

    </style>
</head>
<body>
    <div class="card">
        <h1>Telegram Chat ID Taker</h1>
        @if($lastChatId)
        {{-- true sign --}}
            <div><i class="fa fa-check" style="color: green;"></i></div>
            <p>Last Chat ID: {{ $lastChatId }}</p>
        @else
            {{-- false sign --}}
            <div><i class="fa fa-times" style="color: red;"></i></div>
            <p>No chat ID found.</p>
            <p>Please send a message to the bot to get your chat ID.</p>
        @endif
    </div>
</body>
</html>
