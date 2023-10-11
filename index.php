<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
$token = '6448821928:AAEswUb9WaqljpLHjuvw4c0G4TtYZ96VARw'; // Reemplaza con tu token de acceso

$result = false; // Inicializa $result como falso

if (isset($_POST['chat_id']) && isset($_POST['msg'])) {
  $chat_id = $_POST['chat_id'];
  $msg = $_POST['msg'];

  $url = "https://api.telegram.org/bot$token/sendMessage"; // Corregir la variable de token

  $data = [
    'chat_id' => $chat_id,
    'text' => $msg,
  ];

  $options = [
    'http' => [
      'method' => 'POST',
      'header' => 'Content-Type: application/x-www-form-urlencoded',
      'content' => http_build_query($data),
    ],
  ];

  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Telegram Bot API</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" />
  <link rel="stylesheet" href="./font.css">
</head>

<body>
  <main class="container">
    <nav aria-label="breadcrumb">
      <ul>
        <li><a href="https://www.telegram.org/" class="contrast">Telegram</a></li>
        <li>Bot API</li>
      </ul>
    </nav>
    <article style="margin-top: 0px;">
      <header>
        <hgroup>
          <h1>Sent a message.</h1>
          <a href="https://www.github.com/xrimsonn">José Antonio Rosales</a>
        </hgroup>
      </header>
      <form action="" method="POST">
        <label for="chat_id">Chat ID</label>
        <input type="text" name="chat_id" id="chat_id" placeholder="6488718466..." required>
        <label for="msg">Mensaje</label>
        <input type="text" name="msg" id="msg" placeholder="My message..." required>
        <button type="submit" class="contrast">Send</button>
      </form>
      <?php if (isset($_POST['chat_id']) && isset($_POST['msg'])) { ?>
        <?php if ($result) { ?>
          <p><ins>Message sent successfully</ins></p>
        <?php } else { ?>
          <p><mark>An error has occurred</mark></p>
        <?php } ?>
      <?php } ?>
      <footer>
        <details open>
          <summary>Steps</summary>
          <ul>
            <li>Create a telegram account</li>
            <li>Get your Chat ID using <kbd>@userinfobot</kbd></li>
            <li>Sent<code>/start</code>to <kbd>@test_antonnn_bot</kbd></li>
            <li>Type any message you want and send it</li>
            <li>Recive the response from the bot</li>
          </ul>
        </details>
      </footer>
    </article>
  </main>
</body>

</html>