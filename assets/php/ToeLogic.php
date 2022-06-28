<?php

namespace TicTacToe;

class ToeLogic
{
    public $matrix = Array(
        Array(0, 0, 0),
        Array(0, 0, 0),
        Array(0, 0, 0)
    );

    public function setCell($pos)
    {
        $posX = $posY = 0;

        switch ($pos) {
            case 1:
                $posX = 0;
                $posY = 0;
                break;
            case 2:
                $posX = 1;
                $posY = 0;
                break;
            case 3:
                $posX = 2;
                $posY = 0;
                break;
            case 4:
                $posX = 0;
                $posY = 1;
                break;
            case 5:
                $posX = 1;
                $posY = 1;
                break;
            case 6:
                $posX = 2;
                $posY = 1;
                break;
            case 7:
                $posX = 0;
                $posY = 2;
                break;
            case 8:
                $posX = 1;
                $posY = 2;
                break;
            case 9:
                $posX = 2;
                $posY = 2;
        }

        $this->matrix[$posY][$posX] = 1;
    }

    public function botCell($rc)
    {
        $posX = $posY = 0;

        switch ($rc) {
            case 1:
                $posX = 0;
                $posY = 0;
                break;
            case 2:
                $posX = 1;
                $posY = 0;
                break;
            case 3:
                $posX = 2;
                $posY = 0;
                break;
            case 4:
                $posX = 0;
                $posY = 1;
                break;
            case 5:
                $posX = 1;
                $posY = 1;
                break;
            case 6:
                $posX = 2;
                $posY = 1;
                break;
            case 7:
                $posX = 0;
                $posY = 2;
                break;
            case 8:
                $posX = 1;
                $posY = 2;
                break;
            case 9:
                $posX = 2;
                $posY = 2;
        }

        $this->matrix[$posY][$posX] = 1;
    }
}