<?php

namespace GTD\Task\Domain\Model;

enum Priority
{
    case Low;
    case Medium;
    case High;
    case Urgent;
}