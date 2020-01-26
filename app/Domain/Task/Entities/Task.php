<?php

namespace App\Domain\Task\Entities;

use App\Domain\Task\ValueObjects\TaskFilter;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id', 'due_date', 'done'
    ];

    protected $hidden = [
        'user_id',
    ];

    public function scopeFilterByUserIdAndDate($query, TaskFilter $filter)
    {
        return $query->where('user_id', $filter->getId())->where('due_date', $filter->getDueDate());
    }
}
