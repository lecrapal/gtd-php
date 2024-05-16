<?php

namespace GTD\Task\Application\CommandHandler;

use GTD\Task\Application\Command\CreateUnlistedTaskCommand;
use GTD\Task\Domain\Model\Details;
use GTD\Task\Domain\Model\UnlistedTask;
use GTD\Task\Domain\Repository\TaskRepositoryInterface;

readonly class CreateUnlistedTaskCommandHandler
{
    public function __construct(
        private TaskRepositoryInterface $taskRepository,
    ) {}

    public function __invoke(CreateUnlistedTaskCommand $command): void
    {
        $nextId = $this->taskRepository->nextId();
        $unlistedTask = new UnlistedTask(
            $nextId,
            new Details(
                $command->getTitle(),
                $command->getDescription(),
                $command->getNotes()
            )
        );

        $this->taskRepository->saveUnlisted($unlistedTask);
    }
}