<?php

namespace GTD\Task\Application\CommandHandler;

use GTD\Task\Application\Command\ConvertUnlistedTaskToTaskCommand;
use GTD\Task\Domain\Model\DueDate;
use GTD\Task\Domain\Model\ProjectId;
use GTD\Task\Domain\Model\Task;
use GTD\Task\Domain\Model\TaskId;
use GTD\Task\Repository\TaskRepositoryInterface;

readonly class ConvertUnlistedTaskToTaskCommandHandler
{
    public function __construct(
        private TaskRepositoryInterface $taskRepository,
    )
    {
    }

    public function __invoke(ConvertUnlistedTaskToTaskCommand $command): void
    {
        $unlistedTask = $this->taskRepository->findUnlisted($command->getUnlistedTaskId());
        $task = Task::createFromUnlistedTask($unlistedTask, $command->getProjectId(), $command->getDueDate());

        $this->taskRepository->save($task);
    }
}