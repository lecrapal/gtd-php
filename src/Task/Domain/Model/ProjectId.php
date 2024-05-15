<?php

namespace GTD\Task\Domain\Model;

use DomainException;

readonly class ProjectId
{
    public function __construct(
        private string $id
    ) {
        if(empty($id)){
            throw new DomainException('TaskId cannot be empty');
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function equals(ProjectId $projectId): bool
    {
        return $this->getId() === $projectId->getId();
    }
}