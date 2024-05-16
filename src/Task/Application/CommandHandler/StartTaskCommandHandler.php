<?php

namespace GTD\Task\Application\CommandHandler;

use GTD\Task\Application\Command\StartTaskCommand;
use GTD\Task\Application\Exception\ApplicationException;
use GTD\Task\Domain\Repository\TaskRepositoryInterface;

readonly class StartTaskCommandHandler
{
    public function __construct(
        private TaskRepositoryInterface $taskRepository,
    ) {}

    public function __invoke(StartTaskCommand $command): void
    {
        $task = $this->taskRepository->find($command->getTaskId());

        if($task === null){
            throw new ApplicationException("Task not found");
        }

        $task->inProgress();
        $this->taskRepository->save($task);
    }
}