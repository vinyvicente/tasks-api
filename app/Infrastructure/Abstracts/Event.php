<?php

namespace App\Infrastructure\Abstracts;

use Illuminate\Queue\SerializesModels;

abstract class Event
{
    use SerializesModels;

    abstract public function getValueObject(): object;
}
