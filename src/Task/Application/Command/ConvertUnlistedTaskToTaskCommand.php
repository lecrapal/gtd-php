<?php

namespace GTD\Task\Application\Command;

use GTD\Task\Domain\Model\DueDate;
use GTD\Task\Domain\Model\ProjectId;
use GTD\Task\Domain\Model\TaskId;

readonly class ConvertUnlistedTaskToTaskCommand
{
    public function __construct(
        private TaskId $unlistedTaskId,
        private ProjectId $projectId,
        private ?DueDate $dueDate = null
        )
    {
    }

    public function getUnlistedTaskId(): TaskId
    {
        return $this->unlistedTaskId;
    }

    public function getProjectId(): ProjectId
    {
        return $this->projectId;
    }

    public function getDueDate(): ?DueDate
    {
        return $this->dueDate;
    }
}