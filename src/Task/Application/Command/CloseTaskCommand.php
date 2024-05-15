<?php

namespace GTD\Task\Application\Command;

use GTD\Task\Domain\Model\TaskId;

readonly class CloseTaskCommand
{
    public function __construct(
        private TaskId $taskId,
    ) {}

    public function getTaskId(): TaskId
    {
        return $this->taskId;
    }
}