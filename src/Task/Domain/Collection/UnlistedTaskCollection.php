<?php

namespace GTD\Task\Domain\Collection;

use ArrayIterator;
use GTD\Task\Domain\Model\TaskId;
use GTD\Task\Domain\Model\UnlistedTask;
use IteratorAggregate;

class UnlistedTaskCollection implements IteratorAggregate
{
    /**
     * @var UnlistedTask[]
     */
    private array $tasks;

    public function __construct(UnlistedTask ...$tasks)
    {
        $this->tasks = $tasks;
    }

    public function putTask(UnlistedTask $task): void
    {
        $index = $this->getTaskIndexById($task->getId());

        if ($index !== null) {
            $this->tasks[$index] = $task;
        } else {
            $this->tasks[] = $task; // Add if task does not exist
        }
    }

    public function removeTask(UnlistedTask $task): void
    {
        $index = $this->getTaskIndexById($task->getId());

        if ($index !== null) {
            unset($this->tasks[$index]);
            $this->tasks = array_values($this->tasks);  // re-index keys
        }
    }

    public function count(): int
    {
        return count($this->tasks);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->tasks);
    }

    private function getTaskIndexById(TaskId $id): ?int{
        foreach ($this->tasks as $index => $existingTask) {
            if ($existingTask->getId()->equals($id)) {
                return $index;
            }
        }

        return null;  // return null if task does not exist
    }
}