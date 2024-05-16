<?php

namespace GTD\Task\Application\Contract;

use GTD\Task\Domain\Collection\TaskCollection;

interface ListNextActionsTasksPresenter
{
    public function present(TaskCollection $tasks): void;
}