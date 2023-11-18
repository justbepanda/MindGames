<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;

function BrainEven()
{
    line('Welcome to the Brain Games');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $wins = 0;
    while ($wins < 3) {
        $number = rand(1, 99);
        if ($number % 2 === 0) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        line('Question: %s', $number);
        $answer = prompt('Your answer');
        if ($answer === $correctAnswer) {
            line('Correct!');
            $wins++;
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'.', $answer, $correctAnswer);
            line('Let\'s try again, %s', $name);
            $wins = 0;
        }
    }
    line('Congratulations, %s!', $name);
}
