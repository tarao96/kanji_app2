<?php

namespace App\Repositories;

use App\Models\EventDate;

class EventDateRepository
{
    public function index(int $event_id)
    {
        return EventDate::where('event_id', $event_id)->get();
    }

    public function bulkStore(int $event_id, array $dates)
    {
        foreach($dates as $date)
        {
            $eventDate = new EventDate;
            $eventDate->fill([
                'event_id' => $event_id,
                'date' => $date,
            ])->save();
        }
    }
}
