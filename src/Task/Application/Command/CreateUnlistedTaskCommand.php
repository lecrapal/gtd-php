<?php

namespace GTD\Task\Application\Command;

readonly class CreateUnlistedTaskCommand
{
    public function __construct(
        private string $title,
        private string $description = '',
        private string $notes = '',
        )
    {
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