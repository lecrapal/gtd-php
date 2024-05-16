<?php

namespace GTD\Task\Application\QueryHandler;

use GTD\Task\Application\Contract\ListInboxTasksPresenter;
use GTD\Task\Application\Query\ListInboxTasksQuery;
use GTD\Task\Domain\Repository\TaskRepositoryInterface;

readonly class ListInboxTasksQueryHandler
{

    public function __construct(
        private TaskRepositoryInterface $taskRepository,
        private ListInboxTasksPresenter $presenter
    ) {}

    public function __invoke(ListInboxTasksQuery $query): void
    {
        $tasks = $this->taskRepository->findAllUnlisted(
            $query->getFilter(),
            $query->getOrderBy(),
            $query->getOrderDirection(),
            $query->getLimit(),
            $query->getOffset()
        );

        $this->presenter->present($tasks);
    }
}