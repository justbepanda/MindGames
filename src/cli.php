<?php

namespace brain\games\cli;

require_once __DIR__ . '/../vendor/autoload.php';

use function cli\line;
use function cli\prompt;

function welcome()
{
    line('Welcome to the Brain Games');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}