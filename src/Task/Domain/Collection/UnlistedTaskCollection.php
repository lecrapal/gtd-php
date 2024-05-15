<?php

namespace GTD\Task\Domain\Collection;

use ArrayIterator;
use GTD\Task\Domain\Model\TaskId;
use GTD\Task\Domain\Model\UnlistedTask;
use IteratorAggregate;

/**
 * @implements IteratorAggregate<int, UnlistedTask>
 */
class UnlistedTaskCollection implements IteratorAggregate
{
    /**
     * @var UnlistedTask[]
     */
    private array $unlistedTasks;

    public function __construct(UnlistedTask ...$unlistedTasks)
    {
        $this->unlistedTasks = $unlistedTasks;
    }

    public function putTask(UnlistedTask $unlistedTask): void
    {
        $index = $this->getTaskIndexById($unlistedTask->getId());

        if ($index !== null) {
            $this->unlistedTasks[$index] = $unlistedTask;
        } else {
            $this->unlistedTasks[] = $unlistedTask; // Add if task does not exist
        }
    }

    private function getTaskIndexById(TaskId $id): ?int
    {
        foreach ($this->unlistedTasks as $index => $existingUnlistedTask) {
            if ($existingUnlistedTask->getId()->equals($id)) {
                return $index;
            }
        }

        return null;  // return null if task does not exist
    }

    public function removeTask(UnlistedTask $unlistedTask): void
    {
        $index = $this->getTaskIndexById($unlistedTask->getId());

        if ($index !== null) {
            unset($this->unlistedTasks[$index]);
            $this->unlistedTasks = array_values($this->unlistedTasks);  // re-index keys
        }
    }

    public function count(): int
    {
        return count($this->unlistedTasks);
    }


    /** @return ArrayIterator<int, UnlistedTask> */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->unlistedTasks);
    }
}