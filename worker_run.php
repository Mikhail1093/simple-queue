<?php
declare(strict_types=1);

use Queue\QueueDriver\RedisQueueDriver;
use Queue\Worker\Main;

require_once __DIR__ . '/vendor/autoload.php';

$worker = new Main(new RedisQueueDriver());

while (true) {
    if (!$worker->run()) {
        continue;
    }
}
