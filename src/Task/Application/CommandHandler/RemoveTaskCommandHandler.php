<?php

namespace GTD\Task\Application\CommandHandler;

use GTD\Task\Application\Command\RemoveTaskCommand;
use GTD\Task\Application\Command\SwitchProjectCommand;
use GTD\Task\Application\Exception\ApplicationException;
use GTD\Task\Repository\TaskRepositoryInterface;

readonly class RemoveTaskCommandHandler
{
    public function __construct(
        private TaskRepositoryInterface $taskRepository,
    ) {}

    public function __invoke(RemoveTaskCommand $command): void
    {
        $task = $this->taskRepository->find($command->getTaskId());

        if($task === null){
            throw new ApplicationException("Task not found");
        }

        $this->taskRepository->remove($command->getTaskId());
    }
}