<?php

namespace GTD\Task\Application\Command;

use GTD\Project\Domain\Model\ProjectId;
use GTD\Task\Domain\Model\TaskId;

readonly class StartTaskCommand
{
    public function __construct(
        private TaskId $taskId,
    ) {}

    public function getTaskId(): TaskId
    {
        return $this->taskId;
    }
}