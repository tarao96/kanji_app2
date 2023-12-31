<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\CreateRequest;
use App\Services\EventService;

class EventController extends Controller
{
    public $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    public function create(CreateRequest $request)
    {
        $this->eventService->create($request);
        return redirect()->route('schedule');
    }
}
