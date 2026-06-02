<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        header {
            background-color: #4a90e2;
            color: #fff;
            padding: 15px;
            text-align: center;
        }
        .container {
            max-width: 1850px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .chat-box {
            border: 1px solid #ccc;
            height: 630px;
            overflow-y: scroll;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .message {
            margin-bottom: 10px;
        }
        .message .sender {
            font-weight: bold;
            color: #4a90e2;
        }
        .message .timestamp {
            font-size: 12px;
            color: #666;
            margin-left: 10px;
        }
        .input-box {
            display: flex;
            background-color: #f9f9f9;
            border-radius: 5px;
            overflow: hidden;
        }
        .input-box input[type="text"] {
            flex: 1;
            padding: 10px;
            border: none;
            outline: none;
            font-size: 14px;
        }
        .input-box input[type="submit"] {
            padding: 10px 20px;
            background-color: #4a90e2;
            color: #fff;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header>
    <h1>Chat</h1>
</header>

<div class="container">
    <div class="chat-box" id="chatBox">
        <!-- Messages will be displayed here -->
    </div>
    <form id="messageForm" class="input-box">
        <input type="text" id="messageInput" placeholder="Type your message...">
        <input type="submit" value="Send">
    </form>
</div>

<script>
    const messageForm = document.getElementById('messageForm');
    const messageInput = document.getElementById('messageInput');
    const chatBox = document.getElementById('chatBox');

    messageForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const messageText = messageInput.value.trim();
        if (messageText !== '') {
            sendMessage(messageText);
            messageInput.value = '';
        }
    });

    function sendMessage(messageText) {
        const currentTime = new Date();
        const hours = currentTime.getHours().toString().padStart(2, '0');
        const minutes = currentTime.getMinutes().toString().padStart(2, '0');
        const timestamp = `${hours}:${minutes}`;

        const message = document.createElement('div');
        message.classList.add('message');
        message.innerHTML = `
            <span class="sender">You</span>:
            <span>${messageText}</span>
            <span class="timestamp">${timestamp}</span>
        `;
        chatBox.appendChild(message);

        // Scroll to the bottom of the chat box
        chatBox.scrollTop = chatBox.scrollHeight;
    }
</script>

</body>
</html>
