<?php

namespace GTD\Task\Application\CommandHandler;

use GTD\Task\Application\Command\ConvertUnlistedTaskToTaskCommand;
use GTD\Task\Application\Exception\ApplicationException;
use GTD\Task\Domain\Service\TaskService;
use GTD\Task\Repository\TaskRepositoryInterface;

readonly class ConvertUnlistedTaskToTaskCommandHandler
{
    public function __construct(
        private TaskService $taskService,
        private TaskRepositoryInterface $taskRepository,
    ) {}

    /**
     * @throws ApplicationException
     */
    public function __invoke(ConvertUnlistedTaskToTaskCommand $command): void
    {
        $unlistedTask = $this->taskRepository->findUnlisted($command->getUnlistedTaskId());

        if($unlistedTask === null){
            throw new ApplicationException("Unlisted task not found");
        }

        $task = $this->taskService->createTaskFromUnlistedTask(
            $unlistedTask,
            $command->getProjectId(),
            $command->getDueDate()
        );

        $this->taskRepository->save($task);
    }
}