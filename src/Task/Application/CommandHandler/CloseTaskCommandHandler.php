<?php

namespace GTD\Task\Application\CommandHandler;

use GTD\Task\Application\Command\CloseTaskCommand;
use GTD\Task\Application\Command\SwitchProjectCommand;
use GTD\Task\Application\Exception\ApplicationException;
use GTD\Task\Repository\TaskRepositoryInterface;

readonly class CloseTaskCommandHandler
{
    public function __construct(
        private TaskRepositoryInterface $taskRepository,
    ) {}

    public function __invoke(CloseTaskCommand $command): void
    {
        $task = $this->taskRepository->find($command->getTaskId());

        if($task === null){
            throw new ApplicationException("Task not found");
        }

        $task->done();
        $this->taskRepository->save($task);
    }
}