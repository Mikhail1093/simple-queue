<?php
declare(strict_types=1);

namespace Queue\Director;

use Queue\QueueDriver\QueueDriverInterface;
use Queue\Tasks\TaskInterface;

/**
 * Class Main
 *
 * @package Queue\Director
 */
class Main
{

    /**
     * @var \Queue\QueueDriver\QueueDriverInterface
     */
    protected $queueDriver;

    /**
     * Main constructor.
     *
     * @param \Queue\QueueDriver\QueueDriverInterface $queueDriver
     */
    public function __construct(QueueDriverInterface $queueDriver)
    {
        $this->queueDriver = $queueDriver;
    }

    /**
     * @param \Queue\Tasks\TaskInterface $task
     */
    public function addTask(TaskInterface $task)
    {
        $this->queueDriver->addTaskToStorage($task, '');
    }
}
