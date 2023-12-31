<?php

namespace App\Services;

use App\Repositories\EventDateRepository;

class EventDateService
{
    public $eventDateRepository;

    public function __construct(EventDateRepository $eventDateRepository)
    {
        $this->eventDateRepository = $eventDateRepository;
    }

    public function index(int $event_id)
    {
        return $this->eventDateRepository->index($event_id);
    }
}
