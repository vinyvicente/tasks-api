<?php

namespace App\Domain\Task\ValueObjects;

class TaskFilter
{
    private int $userId;
    private string $dueDate;

    public function __construct(int $userId, string $dueDate)
    {
        $this->userId = $userId;
        $this->dueDate = $dueDate;
    }

    public function getId(): int
    {
        return $this->userId;
    }

    public function getDueDate(): string
    {
        return $this->dueDate;
    }
}
