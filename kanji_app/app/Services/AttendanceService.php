<?php

namespace App\Services;

// DBファサード
use Illuminate\Support\Facades\DB;

// リポジトリ
use App\Repositories\AttendanceRepository;
use App\Repositories\UserRepository;
use App\Repositories\CommentRepository;

class AttendanceService
{
    public $attendanceRepository;
    public $userRepository;
    public $commentRepository;

    public function __construct
    (
        AttendanceRepository $attendanceRepository,
        UserRepository $userRepository,
        CommentRepository $commentRepository
    )
    {
        $this->attendanceRepository = $attendanceRepository;
        $this->userRepository = $userRepository;
        $this->commentRepository = $commentRepository;
    }

    public function create($request)
    {
        try {
            // トランザクション開始
            DB::beginTransaction();

            // ユーザー情報保存
            $user_data = [
                'name' => $request->name,
                'event_id' => session('event_id'), // セッションから取得
            ];

            if (session('user_id')) { // 幹事の場合
                // ユーザー更新
                $user = $this->userRepository->update(session('user_id'), $user_data);
            } else {
                // ユーザー登録
                $user = $this->userRepository->create($user_data);
            }

            // 出欠情報保存
            foreach ($request->selected_dates as $date) {
                $attendance_data = [
                    'user_id' => $user->id,
                    'event_date_id' => $date['dateId'],
                    'attend_status' => $date['attendStatus'],
                ];
                $this->attendanceRepository->create($attendance_data);
            }

            // コメント保存
            $comment_data = [
                'user_id' => $user->id,
                'event_id' => session('event_id'), // セッションから取得
                'body' => $request->comment,
            ];
            if ($request->comment) $this->commentRepository->create($comment_data);

            // トランザクション終了
            DB::commit();
        } catch (\Exception $e) {
            // ロールバック
            DB::rollback();
            throw $e;
        }
    }
}
