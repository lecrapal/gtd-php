<?php

namespace GTD\Task\Application\CommandHandler;

use GTD\Task\Application\Command\UpdateTaskCommand;
use GTD\Task\Application\Exception\ApplicationException;
use GTD\Task\Domain\Model\Details;
use GTD\Task\Repository\TaskRepositoryInterface;

readonly class UpdateTaskCommandHandler
{
    public function __construct(
        private TaskRepositoryInterface $taskRepository,
    ) {}

    public function __invoke(UpdateTaskCommand $command): void
    {
        $task = $this->taskRepository->find($command->getTaskId());

        if($task === null){
            throw new ApplicationException("Task not found");
        }

        $task->setDetails(
            new Details(
                $command->getTitle(),
                $command->getDescription(),
                $command->getNotes()
            )
        );

        $task->setDueDate($command->getDueDate());

        $this->taskRepository->save($task);
    }
}