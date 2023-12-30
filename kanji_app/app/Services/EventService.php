<?php

namespace App\Services;

use Illuminate\Http\Request;

use App\Repositories\EventRepository;
use App\Repositories\EventDateRepository;

class EventService
{
    public $eventRepository;
    public $eventDateRepository;

    public function __construct
    (
        EventRepository $eventRepository,
        EventDateRepository $eventDateRepository
    )
    {
        $this->eventRepository = $eventRepository;
        $this->eventDateRepository = $eventDateRepository;
    }

    public function create(Request $request)
    {
        // イベント情報保存
        $data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ];
        $event = $this->eventRepository->store($data);

        // イベント日程保存
        $dates = explode("\n", $request->input('date'));
        $this->eventDateRepository->bulkStore($event->id, $dates);
    }
}
