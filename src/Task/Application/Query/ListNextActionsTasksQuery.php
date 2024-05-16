<?php

namespace GTD\Task\Application\Query;

readonly class ListNextActionsTasksQuery
{
    public function __construct(
        private string $filter,
        private string $orderBy,
        private string $orderDirection,
        private int $limit,
        private int $offset
    ) {}

    public function getFilter(): string
    {
        return $this->filter;
    }

    public function getOrderBy(): string
    {
        return $this->orderBy;
    }

    public function getOrderDirection(): string
    {
        return $this->orderDirection;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }
}