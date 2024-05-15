<?php

namespace GTD\Task\Application\QueryHandler;

use GTD\Task\Application\Contract\ShowTaskPresenter;
use GTD\Task\Application\Exception\ApplicationException;
use GTD\Task\Application\Query\ShowTaskQuery;
use GTD\Task\Repository\TaskRepositoryInterface;

readonly class ShowTaskQueryHandler
{

    public function __construct(
        private TaskRepositoryInterface $taskRepository,
        private ShowTaskPresenter $presenter
    ) {}

    public function __invoke(ShowTaskQuery $query): void
    {
        $task = $this->taskRepository->find($query->getTaskId());

        if ($task === null) {
            throw new ApplicationException("Task not found");
        }

        $this->presenter->present($task);
    }
}