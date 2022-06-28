<?php
session_start();

require_once __DIR__."/assets/php/ToeUser.php";

$user = new \TicTacToe\ToeUser();

if (!isset($_SESSION['uid']) || empty($_SESSION['uid']))
{
    header('Location: /');
}

if (isset($_GET['exit']))
{
    session_destroy();
    header('Location: /');
}

if (isset($_GET['restart']))
{
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Матч - Крестики-нолики</title>
</head>
<body>
<div id="root">
    <header>
        <h1>Крестики-нолики</h1>
    </header>

    <main>
        <strong class="scoreboard">Уровень игрока: <?= $user->totalScore() ?> <span><a href="?exit">Выйти</a></span><span><a href="?restart">Начать заново</a></span></strong>
        <article class="container">
            <button onclick="setField(1)" class="field-item" id="field1"></button>
            <button onclick="setField(2)" class="field-item" id="field2"></button>
            <button onclick="setField(3)" class="field-item" id="field3"></button>
            <button onclick="setField(4)" class="field-item" id="field4"></button>
            <button onclick="setField(5)" class="field-item" id="field5"></button>
            <button onclick="setField(6)" class="field-item" id="field6"></button>
            <button onclick="setField(7)" class="field-item" id="field7"></button>
            <button onclick="setField(8)" class="field-item" id="field8"></button>
            <button onclick="setField(9)" class="field-item" id="field9"></button>
        </article>

        <script type="text/javascript" src="/matchReader.js"></script>
    </main>
</div>
</body>
</html>