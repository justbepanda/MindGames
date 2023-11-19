<?php

namespace BrainGames\Games;

require_once __DIR__ . '/../src/Engine.php';

use function cli\line;
use function BrainGames\Engine\welcome;
use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\checkAnswer;
use function BrainGames\Engine\showVictory;

$name = '';


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

function BrainEven()
{
    $gameRules = 'Answer "yes" if the number is even, otherwise answer "no".';
    welcome($gameRules);
    $wins = 0;
    while ($wins < 3) {
        $number = rand(1, 99);
        if ($number % 2 === 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        askQuestion("$number");
        $answer = getAnswer();
        $result = checkAnswer($answer, $correctAnswer);
        if ($result === true) {
            $wins++;
        } else {
            $wins = 0;
        }
    }
    showVictory();
}
