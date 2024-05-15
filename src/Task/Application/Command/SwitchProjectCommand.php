<?php

namespace GTD\Task\Application\Command;

use GTD\Project\Domain\Model\ProjectId;
use GTD\Task\Domain\Model\TaskId;

readonly class SwitchProjectCommand
{
    public function __construct(
        private TaskId $taskId,
        private ProjectId $newProjectId,
    ) {}

    public function getTaskId(): TaskId
    {
        return $this->taskId;
    }

    public function getNewProjectId(): ProjectId
    {
        return $this->newProjectId;
    }
}