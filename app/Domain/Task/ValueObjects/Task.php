<?php

namespace App\Domain\Task\ValueObjects;

class Task
{
    private ?int $id;
    private int $userId;
    private string $title;
    private string $description;
    private ?bool $done;
    private string $dueDate;

    public function __construct(int $userId, string $title, string $description = '', int $id = null, ?bool $done = false, string $dueDate = '')
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->description = $description;
        $this->done = $done;
        $this->dueDate = $dueDate;
    }

    public function getData(): array
    {
        return [
            'user_id' => $this->userId,
            'title' => $this->title,
            'description' => $this->description,
            'done' => $this->done,
            'due_date' => $this->dueDate,
        ];
    }

    public function getUpdatedData(): array
    {
        $data = [
            'user_id' => $this->userId,
        ];

        if ($this->title) {
            $data['title'] = $this->title;
        }

        if (strlen($this->description) > 3) {
            $data['description'] = $this->description;
        }

        if (!is_null($this->done)) {
            $data['done'] = (bool) $this->done;
        }

        if ($this->dueDate && \DateTime::createFromFormat('Y-m-d', $this->dueDate)) {
            $data['due_date'] = $this->dueDate;
        }

        return $data;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
