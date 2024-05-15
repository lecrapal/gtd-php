<?php

namespace GTD\Task\Application\CommandHandler;

use GTD\Task\Application\Command\SwitchProjectCommand;
use GTD\Task\Application\Exception\ApplicationException;
use GTD\Task\Domain\Service\TaskService;
use GTD\Task\Repository\TaskRepositoryInterface;

readonly class SwitchProjectCommandHandler
{
    public function __construct(
        private TaskService $taskService,
        private TaskRepositoryInterface $taskRepository,
    ) {}

    public function __invoke(SwitchProjectCommand $command): void
    {
        $this->taskService->verifyProjectIsOpen($command->getNewProjectId());

        $task = $this->taskRepository->find($command->getTaskId());

        if($task === null){
            throw new ApplicationException("Task not found");
        }

        $task->setProjectId($command->getNewProjectId());

        $this->taskRepository->save($task);
    }
}