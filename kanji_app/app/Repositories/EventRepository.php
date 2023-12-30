<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository
{
    public function store(array $data)
    {
        $event = new Event;
        $event->fill($data)->save();
        return $event;
    }
}
