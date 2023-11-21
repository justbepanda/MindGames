<?php

namespace BrainGames\Games;

require_once __DIR__ . '/../../src/Engine.php';

use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\checkAnswer;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\showVictory;
use function BrainGames\Engine\welcome;

function BrainCalc()
{
    $gameRules = 'What is the result of the expression?';
    welcome($gameRules);
    $wins = 0;
    while ($wins < 3) {
        $number1 = rand(1, 9);
        $number2 = rand(1, 9);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations)];
        askQuestion("$number1 $operation $number2");
        $answer = getAnswer();
        $correctAnswer = '';
        switch ($operation) {
            case ('+'):
                $correctAnswer = $number1 + $number2;
                break;
            case ('-'):
                $correctAnswer = $number1 - $number2;
                break;
            case ('*'):
                $correctAnswer = $number1 * $number2;
                break;
        }
        $result = checkAnswer($answer, $correctAnswer);
        if ($result === true) {
            $wins++;
        } else {
            $wins = 0;
        }
    }
    showVictory();
}
