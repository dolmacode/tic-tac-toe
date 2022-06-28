<?php
session_start();

require_once "assets/php/ToeUser.php";

$user = new \TicTacToe\ToeUser();

if (!isset($_SESSION['uid'])) {
    if (isset($_GET['userName'])) {
        $userName = htmlspecialchars(trim($_GET['userName']));
        $stmt = $user->db()->prepare('INSERT INTO user VALUES (NULL, ?, 1);');
        $stmt->execute([$userName]);

        $stmt = $user->db()->prepare('SELECT id FROM user WHERE name=? ORDER BY id DESC LIMIT 1;');
        $stmt->execute([$userName]);
        $_SESSION['uid'] = $stmt->fetchColumn();

        header('Location: /match');
    }
} else {
    header('Location: /match');
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link type="text/css" rel="stylesheet" href="/assets/css/normalize.css">
    <link type="text/css" rel="stylesheet" href="/assets/css/fonts.css">
    <link type="text/css" rel="stylesheet" href="/assets/css/style.css">

    <title>Авторизация - Крестики-нолики</title>
</head>
<body>
<div id="root">
    <header>
        <h1>Крестики-нолики</h1>
    </header>

    <main>
        <form class="auth-form">
            <label for="userName">
                Ваше имя:
            </label>
            <input type="text" name="userName" id="userName" placeholder="Например, Иван">

            <button class="auth-submit">Начать игру</button>
        </form>
    </main>
</div>
</body>
</html>