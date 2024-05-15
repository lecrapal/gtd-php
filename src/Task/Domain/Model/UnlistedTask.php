<?php

namespace GTD\Task\Domain\Model;

class UnlistedTask
{
    public function __construct(
        private readonly TaskId $id,
        private Details $details,
    ) {}

    public function getId(): TaskId
    {
        return $this->id;
    }

    public function getDetails(): Details
    {
        return $this->details;
    }

    public function setDetails(Details $details): UnlistedTask
    {
        $this->details = $details;
        return $this;
    }
}