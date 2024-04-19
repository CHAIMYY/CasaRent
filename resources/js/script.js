$(document).ready(function() {
    // Function to load messages
    function loadMessages() {
        $.ajax({
            url: 'load_messages.php',
            type: 'GET',
            success: function(response) {
                $('#chat-messages').html(response);
            }
        });
    }

    // Load messages initially
    loadMessages();

    // Send message
    $('#send-btn').click(function() {
        var message = $('#message-input').val();
        $.ajax({
            url: 'send_message.php',
            type: 'POST',
            data: { message: message },
            success: function(response) {
                // Clear input field after sending message
                $('#message-input').val('');
                // Reload messages after sending
                loadMessages();
            }
        });
    });

    // Function to poll for new messages
    function pollMessages() {
        $.ajax({
            url: 'load_messages.php',
            type: 'GET',
            success: function(response) {
                $('#chat-messages').html(response);
                // Poll again after 5 seconds
                setTimeout(pollMessages, 5000);
            }
        });
    }

    // Start polling for new messages
    pollMessages();
});
