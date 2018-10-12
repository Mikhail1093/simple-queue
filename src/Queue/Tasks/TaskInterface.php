<?php
declare(strict_types=1);

namespace Queue\Tasks;

interface TaskInterface
{
    public function __construct();

    public function handle(): bool;
}