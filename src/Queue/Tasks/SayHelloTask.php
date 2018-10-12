<?php
declare(strict_types=1);


namespace Queue\Tasks;

use Predis\Client;

class SayHelloTask implements TaskInterface
{

    private $phrase;

    public function __construct()
    {
        $this->phrase = '1' . 'Hello1 ' . \time() . \PHP_EOL;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $redis = new Client();
        $handleResult = $redis->rpush('my', [$this->phrase]);

        if ($handleResult) {
            return true;
        }

        return false;
    }
}
