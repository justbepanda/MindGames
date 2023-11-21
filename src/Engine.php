<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function welcome($gameRules)
{
    global $name;
    line('Welcome to the Brain Games');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('%s', $gameRules);
}

function askQuestion($question)
{
    line("Question: $question");
}

function getAnswer()
{
    return prompt('Your answer');
}

function checkAnswer($answer, $correctAnswer)
{
    global $name;
    if ($answer == $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $correctAnswer);
        line('Let\'s try again, %s', $name);
        return false;
    }
}

function showVictory()
{
    global $name;
    line('Congratulations, %s!', $name);
}
