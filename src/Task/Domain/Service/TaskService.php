<?php

namespace GTD\Task\Domain\Service;

use DomainException;
use GTD\Project\Domain\Model\ProjectId;
use GTD\Task\Domain\Model\DueDate;
use GTD\Task\Domain\Model\Task;
use GTD\Task\Domain\Model\UnlistedTask;

readonly class TaskService
{
    public function __construct(
        private ProjectStatusProvider $projectStatusProvider
    ) {}

    public function createTaskFromUnlistedTask(
        UnlistedTask $unlistedTask,
        ProjectId $projectId,
        ?DueDate $dueDate
    ): Task {
        $this->verifyProjectIsOpen($projectId);
        return Task::createFromUnlistedTask($unlistedTask, $projectId, $dueDate);
    }

    public function verifyProjectIsOpen(ProjectId $projectId): void
    {
        if (!$this->projectStatusProvider->isProjectOpen($projectId)) {
            throw new DomainException('Cannot create task because project is closed');
        }
    }
}