<?php

namespace App\Repositories;

use App\Models\EventDate;

class EventDateRepository
{
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
