<?php

namespace GTD\Task\Domain\Repository;

use GTD\Task\Domain\Collection\TaskCollection;
use GTD\Task\Domain\Collection\UnlistedTaskCollection;
use GTD\Task\Domain\Model\Task;
use GTD\Task\Domain\Model\TaskId;
use GTD\Task\Domain\Model\UnlistedTask;

interface TaskRepositoryInterface
{
    public function save(Task $task): void;

    public function saveUnlisted(UnlistedTask $unlistedTask): void;

    public function nextId(): TaskId;

    public function find(TaskId $id): ?Task;

    public function findUnlisted(TaskId $id): ?UnlistedTask;

    public function remove(TaskId $taskId): void;

    public function removeUnlisted(TaskId $taskId): void;

    public function findAll(
        string $filter = '',
        string $orderBy = '',
        string $orderDirection = '',
        int $limit = 50,
        int $offset = 0
    ): TaskCollection;

    public function findAllUnlisted(
        string $filter = '',
        string $orderBy = '',
        string $orderDirection = '',
        int $limit = 50,
        int $offset = 0
    ): UnlistedTaskCollection;
}