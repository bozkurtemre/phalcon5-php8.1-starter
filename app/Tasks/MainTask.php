<?php

declare(strict_types=1);

namespace App\Tasks;

use Phalcon\Cli\Task;

class MainTask extends Task
{
    public function testAction(): void
    {
        echo '000000' . PHP_EOL;
    }
}
