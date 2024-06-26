<?php

namespace GTD\Task\Application\CommandHandler;

use GTD\Task\Application\Command\UpdateUnlistedTaskCommand;
use GTD\Task\Application\Exception\ApplicationException;
use GTD\Task\Domain\Model\Details;
use GTD\Task\Domain\Repository\TaskRepositoryInterface;

readonly class UpdateUnlistedTaskCommandHandler
{
    public function __construct(
        private TaskRepositoryInterface $taskRepository,
    ) {}

    public function __invoke(UpdateUnlistedTaskCommand $command): void
    {
        $unlistedTask = $this->taskRepository->findUnlisted($command->getTaskId());

        if($unlistedTask === null){
            throw new ApplicationException("Unlisted task not found");
        }

        $unlistedTask->setDetails(
            new Details(
                $command->getTitle(),
                $command->getDescription(),
                $command->getNotes()
            )
        );

        $this->taskRepository->saveUnlisted($unlistedTask);
    }
}