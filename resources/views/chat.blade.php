@extends('layout')

<style>
body {
    font-family: Arial, sans-serif;
}

#chat-window {
    width: 300px;
    margin: 0 auto;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
}

#chat-messages {
    height: 300px;
    overflow-y: scroll;
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

#chat-messages p {
    margin: 5px 0;
}

#message-input-container {
    margin-top: 10px;
}

#message-input {
    width: 200px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#send-btn {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#send-btn:hover {
    background-color: #45a049;
}


</style>


<div id="chat-window">
    <div id="chat-messages"></div>
    <div id="message-input-container">
        <input type="text" id="message-input" placeholder="Type your message...">
        <button id="send-btn">Send</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
