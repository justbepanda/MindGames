<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

$autoloadPath1 = __DIR__ . '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
// phpcs:disable
function welcome(): bool
{
    line('Welcome to the Brain Games');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    return true;
}
// phpcs:enable
