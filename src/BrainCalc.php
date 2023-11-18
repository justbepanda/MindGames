<?php

namespace BrainGames\BrainCalc;

use function cli\line;
use function cli\prompt;

function BrainCalc()
{
    line('Welcome to the Brain Games');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');


    $wins = 0;
    while ($wins < 3) {
        $number1 = rand(1, 9);
        $number2 = rand(1, 9);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations)];

        line('Question: %s %s %s', $number1, $operation, $number2);

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
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
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
