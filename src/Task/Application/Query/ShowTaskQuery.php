<?php

namespace GTD\Task\Application\Query;

use GTD\Task\Domain\Model\TaskId;

readonly class ShowTaskQuery
{

    public function __construct(
        private TaskId $taskId
    ) {}

    public function getTaskId(): TaskId
    {
        return $this->taskId;
    }
}