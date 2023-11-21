<?php

namespace BrainGames\Games;

require_once __DIR__ . '/../../src/Engine.php';

use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\checkAnswer;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\showVictory;
use function BrainGames\Engine\welcome;

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function BrainGcd()
{
    $gameRules = 'Find the greatest common divisor of given numbers.';
    welcome($gameRules);
    $wins = 0;
    while ($wins < 3) {
        $number1 = rand(1, 20);
        $number2 = rand(1, 20);
        askQuestion("$number1 $number2");
        $answer = getAnswer();
        $correctAnswer = gcd($number1, $number2);
        $result = checkAnswer($answer, $correctAnswer);
        if ($result === true) {
            $wins++;
        } else {
            $wins = 0;
        }
    }
    showVictory();
}
