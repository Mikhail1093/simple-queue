<?php
declare(strict_types=1);

require_once realpath('../vendor/autoload.php');

(new \Queue\Director\Main(new \Queue\QueueDriver\RedisQueueDriver()))->addTask(new \Queue\Tasks\SayHelloTask());
