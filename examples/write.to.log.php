<?php
declare(strict_types=1);

require_once __DIR__ . '../vendor/autoload.php';

(new \Queue\Director\Main(new \Queue\QueueDriver\RedisQueueDriver()))->addTask(new \Queue\Tasks\WritePhraseToLogTask());
