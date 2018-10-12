<?php
declare(strict_types=1);

namespace Queue\Worker;

use Queue\QueueDriver\QueueDriverInterface;
use Queue\Tasks\TaskInterface;

/**
 * Class Main
 *
 * @package Queue\Worker
 */
class Main
{
    /**
     * @var QueueDriverInterface
     */
    protected $queueDriver;

    public function __construct(QueueDriverInterface $driver)
    {
        $this->setQueueDriver($driver);
    }

    /**
     * запуск воркера
     */
    public function run(): bool
    {
        $task = $this->queueDriver->getTaskFromStorage();

        if ($task === null) {
            return false;
        }

        $task = unserialize($task);

        if ($task instanceof TaskInterface) {
            $task->handle();

            return true;
        }

        return false;
    }

    /**
     * @return QueueDriverInterface
     */
    public function getQueueDriver(): QueueDriverInterface
    {
        return $this->queueDriver;
    }

    /**
     * @param QueueDriverInterface $queueDriver
     *
     * @return Main
     */
    protected function setQueueDriver(QueueDriverInterface $queueDriver): Main
    {
        $this->queueDriver = $queueDriver;

        return $this;
    }
}
