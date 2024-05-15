<?php

namespace GTD\Task\Domain\Model;

use DomainException;

class Details
{
    public function __construct(
        private string $title,
        private string $description = '',
        private string $notes = '',
    ) {
        $this->setTitle($title);
    }

    public function setTitle(string $title): Details
    {
        if (empty($title)) {
            throw new DomainException("Title can't be empty");
        }

        $this->title = $title;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Details
    {
        $this->description = $description;
        return $this;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): Details
    {
        $this->notes = $notes;
        return $this;
    }
}