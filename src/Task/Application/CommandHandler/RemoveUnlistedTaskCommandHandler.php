<?php

namespace GTD\Task\Application\CommandHandler;

use GTD\Task\Application\Command\RemoveUnlistedTaskCommand;
use GTD\Task\Application\Exception\ApplicationException;
use GTD\Task\Domain\Repository\TaskRepositoryInterface;

readonly class RemoveUnlistedTaskCommandHandler
{
    public function __construct(
        private TaskRepositoryInterface $taskRepository,
    ) {}

    public function __invoke(RemoveUnlistedTaskCommand $command): void
    {
        $unlistedTask = $this->taskRepository->findUnlisted($command->getTaskId());

        if($unlistedTask === null){
            throw new ApplicationException("Unlisted task not found");
        }

        $this->taskRepository->removeUnlisted($command->getTaskId());
    }
}