<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EventDateService;

class EventDateController extends Controller
{
    public $eventDateService;

    public function __construct(EventDateService $eventDateService)
    {
        $this->eventDateService = $eventDateService;
    }

    public function index()
    {
        $event_id = session('event_id'); // セッションから取得
        $dates = $this->eventDateService->index($event_id);
        return view('schedule', ['dates' => $dates]);
    }
}
