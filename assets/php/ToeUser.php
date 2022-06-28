<?php

namespace TicTacToe;

session_start();

class ToeUser
{
    public function db()
    {
        $host = '127.0.0.1';
        $db   = 'tictactoe';
        $user = 'root';
        $pass = 'root';
        $port = "3306";
        $charset = 'utf8mb4';

        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        try {
            return new \PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function totalScore()
    {
        $stmt = $this->db()->prepare('SELECT totalscore FROM user WHERE id=?;');
        $stmt->execute([$_SESSION['uid']]);

        return $stmt->fetchColumn();
    }

    public function writeMatch(string $winner)
    {

        if ($winner == "1") {
            $stmt = $this->db()->prepare('UPDATE user SET totalscore=totalscore+1 WHERE id=?;');
            $stmt->execute([$_SESSION['uid']]);
        } else if ($this->totalScore() > 1) {
            $stmt = $this->db()->prepare('UPDATE user SET totalscore=totalscore-1 WHERE id=?;');
            $stmt->execute([$_SESSION['uid']]);
        }
    }
}