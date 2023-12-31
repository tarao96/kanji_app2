<?php

namespace App\Services;

use Illuminate\Http\Request;

use App\Repositories\EventRepository;
use App\Repositories\EventDateRepository;
use App\Repositories\UserRepository;

class EventService
{
    public $eventRepository;
    public $eventDateRepository;
    public $userRepository;

    public function __construct
    (
        EventRepository $eventRepository,
        EventDateRepository $eventDateRepository,
        UserRepository $userRepository
    )
    {
        $this->eventRepository = $eventRepository;
        $this->eventDateRepository = $eventDateRepository;
        $this->userRepository = $userRepository;
    }

    public function create(Request $request)
    {
        // イベント情報保存
        $event_data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ];
        $event = $this->eventRepository->store($event_data);

        // 主催者情報保存
        $user_data = [
            'event_id' => $event->id,
            'is_kanji' => true
        ];
        $user = $this->userRepository->create($user_data);

        // セッションにイベントIDとユーザーIDを保存
        session([
            'event_id' => $event->id,
            'user_id' => $user->id
        ]);

        // イベント日程保存
        $dates = explode("\n", $request->input('date'));
        $this->eventDateRepository->bulkStore($event->id, $dates);
    }
}
