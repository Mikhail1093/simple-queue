<?php
declare(strict_types=1);

namespace Queue\QueueDriver;

use Exception;
use Predis\Autoloader;
use Predis\Client;
use Queue\Tasks\TaskInterface;

/**
 * Class RedisQueueDriverInterface
 *
 * @package Queue\QueueDriverInterface
 */
class RedisQueueDriver implements QueueDriverInterface
{

    /**
     * @var \Predis\Client
     */
    protected $predis;


    public function __construct()
    {
        Autoloader::register();

        try {
            $this->setPredis(new Client());
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /**
     * @param \Queue\Tasks\TaskInterface $task
     * @param string                     $data
     */
    public function addTaskToStorage(TaskInterface $task, string $data)
    {
        $this->predis->rpush('queue', [\serialize($task)]);
    }

    /**
     * @param mixed $predis
     *
     * @return RedisQueueDriver
     */
    protected function setPredis(Client $predis): RedisQueueDriver
    {
        $this->predis = $predis;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaskFromStorage()
    {
        return $this->predis->rpop('queue');
    }
}
