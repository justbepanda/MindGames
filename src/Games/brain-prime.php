<?php

namespace BrainGames\Games;

require_once __DIR__ . '/../../src/Engine.php';

use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\checkAnswer;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\showVictory;
use function BrainGames\Engine\welcome;

function isPrime($n): string
{
    for ($x = 2; $x < $n; $x++) {
        if ($n % $x === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function BrainPrime()
{
    $gameRules = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    welcome($gameRules);
    $wins = 0;
    while ($wins < 3) {
        $number = rand(1, 50);
        askQuestion("$number");
        $answer = getAnswer();
        $correctAnswer = isPrime($number);
        $result = checkAnswer($answer, $correctAnswer);
        if ($result === true) {
            $wins++;
        } else {
            $wins = 0;
        }
    }
    showVictory();
}
