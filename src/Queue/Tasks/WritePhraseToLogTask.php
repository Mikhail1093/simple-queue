<?php
declare(strict_types=1);

namespace Queue\Tasks;

class WritePhraseToLogTask implements TaskInterface
{

    /**
     * @var string
     */
    protected $phrase;

    public function __construct()
    {
        $this->phrase = 'from request';
    }

    /**
     *
     */
    public function handle(): bool
    {
        $handleResult = file_put_contents(__DIR__, 'result.txt', $this->phrase . \time() . \PHP_EOL, FILE_APPEND);

        if ($handleResult) {
            return true;
        }

        return false;
    }

    /**
     * @param string $phrase
     *
     * @return WritePhraseToLogTask
     */
    public function setPhrase(string $phrase): WritePhraseToLogTask
    {
        $this->phrase = $phrase;

        return $this;
    }
}
