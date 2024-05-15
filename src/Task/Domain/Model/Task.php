<?php

namespace GTD\Task\Domain\Model;

class Task
{
    public function __construct(
        private readonly TaskId $id,
        private ProjectId $projectId,
        private Details $details,
        private Status $status = Status::Open,
        private Priority $priority = Priority::Medium,
        private ?DueDate $dueDate = null
    ) {
        if ($dueDate !== null && $dueDate < DueDate::fromDateTime(new \DateTime())) {
            throw new \InvalidArgumentException('Due date cannot be in the past');
        }
    }

    public static function createFromUnlistedTask(
        UnlistedTask $unlistedTask,
        ProjectId $projectId,
        ?DueDate $dueDate = null
    ): Task
    {
        return new Task(
            $unlistedTask->getId(),
            $projectId,
            $unlistedTask->getDetails(),
            Status::Open,
            Priority::Medium,
            $dueDate
        );
    }

    public function getId(): TaskId
    {
        return $this->id;
    }

    public function getProjectId(): ProjectId
    {
        return $this->projectId;
    }

    public function setProjectId(ProjectId $projectId): Task
    {
        $this->projectId = $projectId;
        return $this;
    }

    public function getDetails(): Details
    {
        return $this->details;
    }

    public function setDetails(Details $details): Task
    {
        $this->details = $details;
        return $this;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): Task
    {
        $this->status = $status;
        return $this;
    }

    public function getPriority(): Priority
    {
        return $this->priority;
    }

    public function setPriority(Priority $priority): Task
    {
        $this->priority = $priority;
        return $this;
    }

    public function getDueDate(): DueDate
    {
        return $this->dueDate;
    }

    public function setDueDate(DueDate $dueDate): Task
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    public function inProgress(): void
    {
        $this->setStatus(Status::InProgress);
    }

    public function done(): void
    {
        $this->setStatus(Status::Done);
    }

}