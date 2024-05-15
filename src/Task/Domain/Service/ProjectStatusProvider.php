<?php

namespace GTD\Task\Domain\Service;

use GTD\Project\Domain\Model\ProjectId;

interface ProjectStatusProvider
{
    public function isProjectOpen(ProjectId $projectId): bool;
}