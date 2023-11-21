<?php

namespace BrainGames\Games;

require_once __DIR__ . '/../../src/Engine.php';

use function BrainGames\Engine\askQuestion;
use function BrainGames\Engine\checkAnswer;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\showVictory;
use function BrainGames\Engine\welcome;

function BrainProgression()
{
    $gameRules = 'What number is missing in the progression?';
    welcome($gameRules);
    $wins = 0;
    while ($wins < 3) {
        $step = rand(1, 3);
        $startValue = rand(1, 10);
        $quantity = rand(5, 10);
        $maxValue = $startValue + $step * $quantity;
        $progression = [];
        for ($i = $startValue; $i <= $maxValue; $i = $i + $step) {
            $progression[] = $i;
        }
        $hideElementPos = rand(0, $quantity - 1);
        $correctAnswer = $progression[$hideElementPos];
        $progression[$hideElementPos] = '..';
        $stringProgression = implode(' ', $progression);
        askQuestion("$stringProgression");
        $answer = getAnswer();
        $result = checkAnswer($answer, $correctAnswer);
        if ($result === true) {
            $wins++;
        } else {
            return false;
        }
    }
    showVictory();
}
