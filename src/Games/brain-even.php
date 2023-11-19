<?php

namespace BrainGames\Games;

require_once __DIR__ . '/../../src/Engine.php';

use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\checkAnswer;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\showVictory;
use function BrainGames\Engine\welcome;

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
