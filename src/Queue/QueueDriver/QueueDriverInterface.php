<?php
declare(strict_types=1);

namespace Queue\QueueDriver;

use Queue\Tasks\TaskInterface;

interface QueueDriverInterface
{
    public function addTaskToStorage(TaskInterface $task, string $data);

    public function getTaskFromStorage();
}