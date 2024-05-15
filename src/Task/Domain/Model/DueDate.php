<?php

namespace GTD\Task\Domain\Model;

use DateTime;
use DomainException;

readonly class DueDate
{
    private function __construct(
        private string $date
    ) {}

    public static function fromDateTime(DateTime $dateTime): self
    {
        if ($dateTime < new DateTime()) {
            throw new DomainException('The due date cannot be before today');
        }

        return new self($dateTime->format('Y-m-d'));
    }

    public function __toString(): string
    {
        return $this->date;
    }
}