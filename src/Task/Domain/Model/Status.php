<?php

namespace GTD\Task\Domain\Model;

enum Status
{
    case Open;
    case InProgress;
    case Done;
}