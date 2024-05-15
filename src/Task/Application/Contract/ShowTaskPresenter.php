<?php

namespace GTD\Task\Application\Contract;

use GTD\Task\Domain\Model\Task;

interface ShowTaskPresenter
{

    public function present(Task $task);
}