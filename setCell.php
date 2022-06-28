<?php

require_once __DIR__.'/assets/php/ToeLogic.php';
require_once __DIR__.'/assets/php/ToeUser.php';

if (isset($_POST['pos']))
{
    $toeLogic = new \TicTacToe\ToeLogic();

    $toeLogic->setCell($_POST['pos']);
}

if (isset($_POST['rc']))
{
    $toeLogic = new \TicTacToe\ToeLogic();

    $toeLogic->botCell($_POST['rc']);
}

if (isset($_POST['winner']))
{
    $toeUser = new \TicTacToe\ToeUser();

    $toeUser->writeMatch($_POST['winner']);
}