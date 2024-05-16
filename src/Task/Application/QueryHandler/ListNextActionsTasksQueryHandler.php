<?php

namespace GTD\Task\Application\QueryHandler;

use GTD\Task\Application\Contract\ListNextActionsTasksPresenter;
use GTD\Task\Application\Query\ListNextActionsTasksQuery;
use GTD\Task\Domain\Repository\TaskRepositoryInterface;

readonly class ListNextActionsTasksQueryHandler
{

    public function __construct(
        private TaskRepositoryInterface $taskRepository,
        private ListNextActionsTasksPresenter $presenter
    ) {}

    public function __invoke(ListNextActionsTasksQuery $query): void
    {
        $tasks = $this->taskRepository->findAll(
            $query->getFilter(),
            $query->getOrderBy(),
            $query->getOrderDirection(),
            $query->getLimit(),
            $query->getOffset()
        );

        $this->presenter->present($tasks);
    }
}