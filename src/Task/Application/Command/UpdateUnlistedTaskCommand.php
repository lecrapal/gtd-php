<?php

namespace GTD\Task\Application\Command;

use GTD\Task\Domain\Model\TaskId;

readonly class UpdateUnlistedTaskCommand
{
    public function __construct(
        private TaskId $taskId,
        private string $title,
        private string $description = '',
        private string $notes = '',
        )
    {
    }

    public function getTaskId(): TaskId
    {
        return $this->taskId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }
}