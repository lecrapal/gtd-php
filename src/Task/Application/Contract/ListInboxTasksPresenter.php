<?php

namespace GTD\Task\Application\Contract;

use GTD\Task\Domain\Collection\UnlistedTaskCollection;

interface ListInboxTasksPresenter
{
    public function present(UnlistedTaskCollection $unlistedTasks): void;
}